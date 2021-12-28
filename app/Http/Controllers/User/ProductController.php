<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ColorProduct;
use App\Models\Category;
use App\Models\PriceList;
use App\Models\StockList;
use App\Models\Review;
use App\Models\Rating;
use App\Models\SizeProduct;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug_product_name)
    {
        $product = Product::select('product.*')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->whereSlug($slug_product_name)
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
        $page = 1;
        if(request()->get('page')){
            $page = request()->get('page');
        }
        $offset = ($page - 1) * 12;
        $count = 0;

        $wanted = request()->get('wanted');
        $count = Product::where('product_name', 'like', "%$wanted%")
            ->orWhere('product_description', 'like', "%$wanted%")
            ->count();
        $products = Product::where('product_name', 'like', "%$wanted%")
            ->orWhere('product_description', 'like', "%$wanted%")
            ->offset($offset)
            ->limit(12)
            ->get();
        request()->flash();
        $pagination = ceil($count/12);
        return view('user.pages.search', compact('products', 'count', 'page', 'pagination', 'wanted'));
    }
    public function quick_search()
    {
        $wanted = request()->get('wanted');
        $products = Product::where('product_name', 'like', "%$wanted%")
            ->orWhere('product_description', 'like', "%$wanted%")
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
    public function new_products(){
        echo "Yeni mehsullar";
        echo mktime(time(), 'Y:m:d H:m:s');
        // $products = Product::select("product.*")
        //     ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
        //     ->where('product.created_at', '>', "2020-08-16 00:57:18")
        //     ->get();

        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
    }
    public function compare(){
        return view('user.pages.compare');
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
    public function view_compare (){
        $page = 1;
        if(request()->get('page')){
            $page = request()->get('page');
        }
        $offset = ($page - 1) * 12;
        $count = 0;
        $products =[];
        if(isset($_COOKIE['compare'])){
            $cookie = $_COOKIE['compare'];
            $compare = explode("-", $cookie);
            $count = Product::select("product.*")
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->whereIn('product.id', $compare)
                ->count();
                
            $products = Product::select("product.*")
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->whereIn('product.id', $compare)
                ->offset($offset)
                ->limit(12)
                ->get();
        }
        $pagination = ceil($count/12);
        $description = true;
        return view('user.pages.shop_product', compact('products', 'count', 'page', 'pagination', 'description'));
    }
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
        $page = request('page');
        $product_id = request('product_id');
        $page = ($page -1)*3;
        $reviews = Review::where('product_id', $product_id)->orderBy('created_at', 'desc')->offset($page)->limit(3)->get();
        $output = '';
        foreach ($reviews as $review) {
            $ratings = "";
            for ($i=1; $i <=5; $i++) {
                if($i > $review->rating){
                    $color = '-o empty';
                }
                else{
                    $color = '';
                }
                $ratings .= "<i title=". $i ." class='fa fa-star" . $color . "'></i>";
            }
            $output .= "<div class='single-review w-100'>
            <div class='review-heading'>
                <div><a href='javascript:void(0)'><i class='icon-user'></i> " . $review->name . " </a></div>
                <div><a href='javascript:void(0)'><i class='fa fa-clock-o'></i> " . $review->created_at . " </a></div>
                <div class='review-rating product-rating pull-right'>
                " . $ratings . "
                </div>
            </div>
            <div class='review-body'>
                <p>" . $review->review . "</p>
            </div>
        </div>";
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
    public function stock_list (Request $request)
    {
        $product_id = $request->get('product_id');
        $stockList = StockList::where('product_id', $product_id)->where('default_price', 0)->get();
        return response()->json(['stockList' => $stockList]);
    }

}
