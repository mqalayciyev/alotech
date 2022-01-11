<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\ColorProduct;
use App\Models\Measurement;
use App\Models\SizeProduct;
use App\Models\Rating;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(auth()->user());
        $sliders = Slider::orderBy('slider_order', 'asc')->where('slider_active', 1)->get();
        $banner_top = Banner::orderBy('banner_order', 'asc')->where('banner_active', 1)->where('type', 'top')->take(3)->get();
        $banner_center = Banner::orderBy('banner_order', 'asc')->where('banner_active', 1)->where('type', 'center')->first();
        return view('user.pages.home', compact('sliders', 'banner_top', 'banner_center'));
    }

    public function about()
    {
        return view('user.pages.about');
    }
    public function shipping_return()
    {
        return view('user.pages.shipping_return');
    }
    public function privacy()
    {
        return view('user.pages.privacy');
    }

    public function categoryProducts()
    {
        $category_slug = request('category_slug');
        $category = Category::where('slug', $category_slug)->first();
        $sub_categories = Category::where('top_id', $category->id)->get();

        $cat_id = [$category->id];
        for($i=0; $i<count( $sub_categories ); $i++){
            array_push($cat_id, $sub_categories[$i]->id);
        }

        $products = Product::select('product.*')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->leftJoin('category_product', 'category_product.product_id', 'product.id')
            ->whereIn('category_product.category_id', $cat_id)
            ->orderBy('updated_at', 'desc')
            ->take(7)
            ->get();

        return view('user.pages.home_categories', compact('products', 'category_slug'));
    }
    public function products()
    {

        $dynamic_product = request('product');
        if ($dynamic_product == 'products_deal_of_day') {
            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->where('product.discount', '!=', null)
                ->orderBy('updated_at', 'desc')
                ->take(8)
                ->get();


            return view('user.pages.home_discounts', compact('products', 'dynamic_product'));
        }
        if ($dynamic_product == 'products_best_selling') {

            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->orderBy('product.best_selling', 'desc')
                ->take(8)
                ->get();
            return view('user.pages.home_products', compact('products', 'dynamic_product'));
        }
        if ($dynamic_product == 'products_latest') {

            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->orderBy('product.created_at', 'desc')
                ->take(8)
                ->get();
            return view('user.pages.home_products', compact('products', 'dynamic_product'));
        }
        if ($dynamic_product == 'products_last_view') {
            $products = [];
            if (session()->has('your_products')) {
                $your_products = explode("-", session('your_products'));

                $products = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->whereIn('product.id', $your_products)
                    ->orderBy('updated_at', 'desc')
                    ->take(8)
                    ->get();
            }
            return view('user.pages.home_products', compact('products', 'dynamic_product'));
        }

        if ($dynamic_product == 'products_rp') {
            $product_id = request('product_id');
            $category = request('category');
            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                ->leftJoin('category', 'category.id', 'category_product.category_id')
                ->where('category.slug', $category)
                ->where('product.id', '!=', $product_id)
                ->orderBy('updated_at', 'desc')
                ->take(6)
                ->get();
            return view('user.pages.single_product', compact('products'));
        }
    }

    public function insert_ratings()
    {
        $index = request('index');
        $product_id = request('product_id');
        $insert = Rating::insert([
            'product_id' => $product_id,
            'rating' => $index
        ]);
        if (isset($insert)) {
            echo 'done';
        }
    }
    public function contact()
    {
        return view('user.pages.contact');
    }
    public function send()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|min:8',
            'message' => 'required|min:3',
        ]);

        Contact::create([
            'name' => request('name'),
            'email' => request('email'),
            'message' => request('message'),
        ]);
        return back()->with(['message_type' => 'success', 'message' => 'Cavabınız üçün təşəkkürlər.']);
    }

    public function invoice()
    {
        return view('common.invoices.default');
    }
    public function get_product()
    {
        $products = Product::where('product.id', request('id'))->first();
        $options = '';
        $price = [];
        foreach ($products->price as $object) {
            $price[] = $object->toArray();
        }

        $filter_1 = array_filter($price, function ($item) {
            if ($item['color_id'] != null && $item['size_id'] != null) {
                return true;
            }
        });
        $filter_2 = array_filter($price, function ($item) {
            if ($item['color_id'] != null || $item['size_id'] != null) {
                return true;
            }
        });
        $filter_3 = array_filter($price, function ($item) {
            if ($item['default_price'] == 1) {
                return true;
            }
        });
        if (count($filter_1)) {
            foreach ($filter_1 as $item) {
                if ($item) {
                    $amount =  $products->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $products->discount) / 100), 2) . '</span>₼<del><span class="product_amount">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount">' . $item['sale_price'] . '</span>₼';
                    break;
                }
            }
        } elseif (count($filter_2)) {
            foreach ($filter_2 as $item) {
                if ($item) {
                    $amount =  $products->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $products->discount) / 100), 2) . '</span>₼<del><span class="product_amount">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount">' . $item['sale_price'] . '</span>₼';
                    break;
                }
            }
        } else {
            foreach ($filter_3 as $item) {
                if ($item) {
                    $amount =  $products->discount ? '<span class="product_amount_discount">' . number_format($item['sale_price'] * ((100 - $products->discount) / 100), 2) . '</span>₼<del><span class="product_amount">' . $item['sale_price'] . '</span>₼ </del>' : '<span class="product_amount">' . $item['sale_price'] . '</span>₼';
                    break;
                }
            }
        }

        foreach ($price as $item) {
            $options .= '<h4 style="color: rgba(173,51,53,255)">';
            if ($item) {
                $item_color = Color::find($item['color_id']);
                $item_size = Size::find($item['size_id']);
                $color_name = $item_color && $item_color->id > 1 ? $item_color->title : '';
                $size_name = $item_size ? $item_size->name : '';
                $options .=  $item['wholesale_count'] ? '*' . $products->product_name . ' ' . $size_name . ' ' . $color_name .  ' ' . $item['wholesale_count'] . ' ' . $products->detail->measurement . ' çox aldıqda satış qiməti ' . $item['wholesale_price'] . '₼' : '';
            }
            $options .= '</h4>';
        }





        if ($products->one_or_more) {
            $options .= '<h4 style="color: rgba(173,51,53,255)">*Məhsulun 1 ' . $products->detail->measurement . ' yuxarı alışına ' . $products->one_or_more . ' bonus hesabınıza əlavə olunacaq </h4>';
        }
        if ($products->other_count) {
            $options .= '<h4 style="color: rgba(173,51,53,255)">*Məhsulun ' . $products->other_count . $products->detail->measurement . ' yuxarı alışına ' . $products->other_bonus . ' bonus hesabınıza əlavə olunacaq </h4>';
        }
        $ratings = Rating::select(DB::raw('avg(rating.rating) AS rating_avg'))->where(['product_id' => $products->id])->get();
        $rating = '';
        for ($count = 1; $count <= 5; $count++) {
            if ($count <= $ratings[0]['rating_avg']) {
                $color = '';
            } else {
                $color = '-o empty';
            }
            $rating .= '<i title="' . $count . '" id="' . $products->id . '-' . $count . '" data-index="' . $count . '" data-product_id="' . $products->id . '" data-rating="' . $ratings[0]['rating_avg'] . '" class="rating fa fa-star' . $color . '"></i>';
        }
        $image = '';
        if ($products->images) {
            $image .= '<div class="item d-flex justify-content-center quick-view-slider">';
            foreach ($products->images as $images) {
                $image .= '<img class="image-color-' . $images->color_id . '" src="' . asset('assets/img/products/' . $images->image_name) . '" alt="">';
            }
            $image .= '</div>';
        } else {
            $image = '<img src="' . asset('assets/img/logo.png') . '" alt="">';
        }
        $colors_sizes = "";
        if (count($products->stock) > 0) {
            $selected_color = '';
            $selected_size = '';
            $colors_sizes .= '<figure id="by-color">';
            $colors_array = array();
            foreach ($products->stock as $stock) {
                if (!in_array($stock->color_id, $colors_array) && $stock->color_id != 1) {
                    $checked = !$selected_color ? "checked" : "";
                    $colors_sizes .= '<div class="ps-checkbox ps-checkbox--color ps-checkbox--inline">
                    <label class="colors">
                        <input type="radio" class="color-element" name="color"
                            data-type="ps-product--quickview"
                            data-id="' . $stock->color->id . '"
                            data-discount="' . $products->discount . '"
                            data-product="' . $products->id . '"
                            data-name="' . $stock->color->name . '"
                            ' . $checked . '
                            value="' . $stock->color->id . '" />
                        <p><span class="filter_color" data-id="' . $stock->color->id . '"
                                data-color="' . $stock->color->name . '"
                                style="background-color:  ' . $stock->color->name . ';"></span></p>
                    </label>
                </div>';
                    $selected_color = $stock->color->id;
                    array_push($colors_array, $stock->color_id);
                }
            }

            $colors_sizes .= '</figure><figure class="sizes">';
            foreach ($products->stock as $stock) {
                if ($stock->size) {
                    $checked = !$selected_size ? "checked" : "";
                    $colors_sizes .= '<label style="font-size: 1.8rem; font-weight: 200;" class="size_label" data-filter="' . $stock->color->id . '">
                    <input type="radio" class="size-element" name="size"
                        data-type="ps-product--quickview"
                        data-id="' . $stock->size->id . '"
                        data-product="' . $products->id . '"
                        data-discount="' . $products->discount . '"
                        data-color="' . $stock->color->id . '"
                        data-name="' . $stock->size->name . '"
                        ' . $checked . '
                        value="' . $stock->size->id . '" />
                    ' . $stock->size->name . '
                </label>';
                    $selected_size = $stock->size->id;
                }
            }
            $colors_sizes .= '</figure>';
        } else {
            $colors_sizes .= ' <h4>Məhsul anbarda mövcud deyil</h4>';
        }


        $output = '<span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
        <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
            <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="false">
                    <div class="ps-product__images" data-arrow="true">
                    ' . $image . '
                    </div>
                </div>
                <div class="ps-product__info ps-product__amount_parent">
                    <h1>' . $products->product_name . '</h1>
                    <div class="ps-product__meta">
                        <p>Marka: <a href="' . route('brand.product', $products->brands[0]->name) . '">' . $products->brands[0]->name . '</a></p>
                    </div>
                    <h4 class="ps-product__price">' . $amount . '</h4>
                    ' . $options . '
                    <div class="ps-product__desc product-rating">

                    ' . $rating . '

                    </div>
                    <div class="ps-product__shopping d-block">
                        ' . $colors_sizes . '
                        <a class="ps-btn ps-btn--black add-to-cart" data-type="ps-product--quickview" data-discount="' . $products->discount . '" data-id="' . $products->id . '" href="javascript:void(0)">Səbətə əlavə et</a>
                        <div class="ps-product__actions">
                        <a href="javascript:void(0)" class="add-wish-list" data-id="' . $products->id . '"><i class="icon-heart"></i></a>
                            <a href="javascript:void(0)" class="add-to-compare" data-id="' . $products->id . '"><i class="fa fa-retweet"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>';
        return $output;
    }
}
