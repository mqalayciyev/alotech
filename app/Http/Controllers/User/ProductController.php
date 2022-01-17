<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ColorProduct;
use App\Models\Category;
use App\Models\Depot;
use App\Models\PriceList;
use App\Models\StockList;
use App\Models\Review;
use App\Models\Rating;
use App\Models\SizeProduct;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function index($slug_product_name)
    {
        $depot = Cookie::get('depot')  ? Cookie::get('depot') : Depot::where('default', 1)->first()->id;

        $product = Product::select('product.*')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->whereSlug($slug_product_name)
            ->leftJoin('price_list', 'price_list.product_id', 'product.id')
            ->where('price_list.depot_id', $depot)
            ->orderBy('updated_at', 'desc')
            ->firstOrFail();
        $rating = Rating::select(DB::raw('avg(rating.rating) AS rating_avg'))
            ->where('product_id', $product->id)
            ->first();
        $category = $product->categories()->distinct()->firstOrFail();
        // $category_top = Category::where('id', $category->top_id)->firstOrFail();
        $images = $product->image()->distinct()->get();
        $sizes = SizeProduct::where('product_id', $product->id)->get();
        $colors = ColorProduct::where('product_id', $product->id)->get();

        return view('user.pages.product', compact('product', 'category', 'images', 'sizes', 'colors', 'rating'));
    }

    public function search()
    {

        $depot = Cookie::get('depot')  ? Cookie::get('depot') : Depot::where('default', 1)->first()->id;

        $page = 1;
        if(request()->get('page')){
            $page = request()->get('page');
        }
        $offset = ($page - 1) * 12;
        $count = 0;

        $wanted = request()->get('wanted');
        $count = Product::select('product.*')->leftJoin('price_list', 'price_list.product_id', 'product.id')
            ->where('product_name', 'like', "%$wanted%")
            ->orWhere('product_description', 'like', "%$wanted%")
            ->where('price_list.depot_id', $depot)
            ->groupBy('product.id')
            ->count();
        $products = Product::select('product.*')->leftJoin('price_list', 'price_list.product_id', 'product.id')
            ->where('product_name', 'like', "%$wanted%")
            ->orWhere('product_description', 'like', "%$wanted%")
            ->where('price_list.depot_id', $depot)
            ->groupBy('product.id')
            ->offset($offset)
            ->limit(12)
            ->get();
        request()->flash();
        $pagination = ceil($count/12);
        return view('user.pages.search', compact('products', 'count', 'page', 'pagination', 'wanted'));
    }
    public function quick_search()
    {
        $depot = Cookie::get('depot')  ? Cookie::get('depot') : Depot::where('default', 1)->first()->id;
        $wanted = request()->get('wanted');
        $products = Product::select('product.*')->leftJoin('price_list', 'price_list.product_id', 'product.id')
            ->where('price_list.depot_id', $depot)
            ->where('product_name', 'like', "%$wanted%")
            ->orWhere('product_description', 'like', "%$wanted%")
            ->groupBy('product.id')
            ->take(12)
            ->get();
        request()->flash();
        $output  = '';
        if(count($products) > 0){
            $output .= "<table class='table table-hover'>";
            foreach ($products as $product) {
                $image = $product->image->main_name ?  asset('assets/img/products/' . $product->image->main_name) : asset('assets/img/logo.png');
                $output .= "<tr>
                                <td style='width: 100px'><img class='w-100' src='$image' alt='" . $product->product_name ."'/></td>
                                <td><a href='" . route('product', $product->slug) ."'>" . $product->product_name . "</a></td>
                            </tr>";
            }
            $output .= " </table>";
        }
        else{
            $output = "<div class='w-100 mx-auto'>
            <h3 class='text-center m-3' style='color: #183153;'>" . __('content.There is no any product') . "</h3>
        </div>";
        }
        return response()->json($output);
    }

    public function compare(){
        $depot = Cookie::get('depot')  ? Cookie::get('depot') : Depot::where('default', 1)->first()->id;
        $products =[];
        if(isset($_COOKIE['compare'])){
            $cookie = $_COOKIE['compare'];
            $compare = explode("-", $cookie);
            $products = Product::select("product.*")
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->whereIn('product.id', $compare)
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                ->get();
        }


        return view('user.pages.compare', compact('products'));
    }
    public function add_to_compare (){
        $cookie_name = "compare";
        $message = "";

        if(isset($_COOKIE[$cookie_name])){
            $cookie = explode("-", $_COOKIE[$cookie_name]);
            if(!in_array(request()->get('id'), $cookie)){
                $cookie_value = $_COOKIE[$cookie_name] . '-' . request()->get('id');
            }
            else{
                $message = "Bu məhsul artıq müqayisəyə əlavə edilib.";
                $cookie_value = $_COOKIE[$cookie_name];
            }
        }
        else{
            $cookie_value = request()->get('id');
        }
        setcookie($cookie_name, $cookie_value, time() + (86400*3), "/");
        if($message === ""){
            $message = "Məhsul müqayisəyə əlavə edildi.";
        }
        return response()->json(['status'  => 'success', 'message' => $message]);
    }
    // public function view_compare (){
    //     $page = 1;
    //     if(request()->get('page')){
    //         $page = request()->get('page');
    //     }
    //     $offset = ($page - 1) * 12;
    //     $count = 0;
    //     $products =[];
    //     if(isset($_COOKIE['compare'])){
    //         $cookie = $_COOKIE['compare'];
    //         $compare = explode("-", $cookie);
    //         $count = Product::select("product.*")
    //             ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
    //             ->whereIn('product.id', $compare)
    //             ->count();

    //         $products = Product::select("product.*")
    //             ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
    //             ->whereIn('product.id', $compare)
    //             ->offset($offset)
    //             ->limit(12)
    //             ->get();
    //     }
    //     $pagination = ceil($count/12);
    //     $description = true;
    //     return view('user.pages.shop_product', compact('products', 'count', 'page', 'pagination', 'description'));
    // }
    public function remove_from_compare()
    {

        $id = request()->get('id');
        $cookie_name = "compare";
        $cookie = $_COOKIE[$cookie_name];
        $array = explode("-", $cookie);
        // $array = array_merge(array_diff($array, array($id)));
        $newarray = array_filter($array, function($var) use ($id){
            if ($var != $id) {
                return true;
            }
        });
        $products = [];
        foreach ($newarray as $key => $value) {
            $products[] = $value;
        }
        if(count($products) > 0)
        {
            $cookie_value = "";
            for($i=0; $i<count($products); $i++)
            {

                if($i !== count($products)-1)
                {
                    $cookie_value .= $products[$i] .'-';
                }
                else
                {
                    $cookie_value .= $products[$i];
                }
            }
            setcookie($cookie_name, $cookie_value, time() + (86400*5), "/");
        }
        else
        {
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, null, -1, '/');
        }
        return response()->json(['status'  => 'success', 'message' => 'Məhsul müqayisədən silindi']);
    }

    public function review ()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|min:8',
            'review' => 'required|min:3',
            'product_id' => 'required'
        ]);

        Review::create([
            'name' => request('name'),
            'email' => request('email'),
            'review' => request('review'),
            'rating' => request('rating'),
            'product_id' => request('product_id')
        ]);
        $product = Product::find(request('product_id'));
        if(auth()->user() && $product->bonus_comment){
            $bonus = auth()->user()->bonus + $product->bonus_comment;
            User::find(auth()->id())->update([
                'bonus' => $bonus
            ]);
        }
        return back();
    }
    public function reviews(){
        $product_id = request('product_id');
        $reviews = Review::where('product_id', $product_id)->orderBy('created_at', 'desc')->get();
        $output = '';
        foreach ($reviews as $review) {
            $ratings = "";
            for ($i=1; $i <=5; $i++) {
                if($i > $review->rating){
                    $color = 'r text-muted';
                }
                else{
                    $color = 's';
                }
                $ratings .= '<small class="fa' . $color . ' fa-star" title="'. $i .'"></small>';
            }
            $output .= '<div class="border-bottom border-color-1 pb-4 mb-4"> <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
            ' . $ratings . '</div> </div>
            <p class="text-gray-90">' . $review->review . '</p>
            <div class="mb-2"><strong>' . $review->name . '</strong>
            <span class="font-size-13 text-gray-23"> ' . $review->created_at . '</div></div>';
        }
        $reviews_count = Review::where('product_id', $product_id)->count();
        // echo $output;
        return ['reviews' => $output, 'count' => $reviews_count];
    }



    public function price_list (Request $request)
    {
        $product_id = $request->get('product_id');
        $priceList = PriceList::where('product_id', $product_id)->where('default_price', 0)->get();

        return response()->json(['priceList' => $priceList]);
    }

}
