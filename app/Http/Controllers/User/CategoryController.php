<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductBrand;
use App\Models\Color;
use App\Models\Size;
use ArrayObject;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index($slug_category_name)
    {
        // echo $slug_category_name;
        $category = Category::where('slug', $slug_category_name)->firstOrFail();
        $sub_categories = Category::where('top_id', $category->id)->get();

        $cat_id = [$category->id];
        for($i=0; $i<count( $sub_categories ); $i++){
            array_push($cat_id, $sub_categories[$i]->id);
        }
        $sub_categories_count = array();

        // echo "<pre>";
        for($i=0; $i< count($sub_categories); $i++){
            $count = DB::table('category_product')->select('*')
                ->leftJoin("product", 'product.id', 'category_product.product_id')
                ->where('category_product.category_id', $sub_categories[$i]->id)
                ->where('product.deleted_at', null)
                ->count();
            $item = ['id' => $sub_categories[$i]->id, 'count' => $count];

            array_push($sub_categories_count, $item);

            // print_r($count);

        }





        $brands = Brand::select('brand.*')
            ->leftJoin('brand_product', 'brand_product.brand_id', 'brand.id')
            ->leftJoin('product', 'product.id', 'brand_product.product_id')
            ->leftJoin('category_product', 'category_product.product_id', 'product.id')
            ->leftJoin('category', 'category.id', 'category_product.category_id')
            ->whereIn('category_product.category_id', $cat_id)
            ->orderBy('brand.name', 'asc')
            ->groupBy('brand.name')
            ->get();
        $brands_count = array();
        for($i=0; $i< count($brands); $i++){

            $count = ProductBrand::select('*')
                ->leftJoin("product", 'product.id', 'brand_product.product_id')
                ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                ->whereIn('category_product.category_id', $cat_id)
                ->where('brand_id', $brands[$i]->id)
                ->where('deleted_at', null)
                ->count();

            $item = ['id' => $brands[$i]->id, 'count' => $count];
            array_push($brands_count, $item);
        }


        $colors = Color::select('color.*')
            ->leftJoin('color_product', 'color_product.color_id', 'color.id')
            ->leftJoin('category_product', 'category_product.product_id', 'color_product.product_id')
            ->whereIn('category_product.category_id', $cat_id)
            ->groupBy('color.name')
            ->get();
        $sizes = Size::select('size.*')
            ->leftJoin('size_product', 'size_product.size_id', 'size.id')
            ->leftJoin('category_product', 'category_product.product_id', 'size_product.product_id')
            ->whereIn('category_product.category_id', $cat_id)
            ->groupBy('size.name')
            ->get();



        return view('user.pages.category', compact('category', 'sub_categories', 'brands', 'slug_category_name', 'brands_count', 'sub_categories_count', 'colors', 'sizes'));
    }

    public function products()
    {
        $page = request('page');
        $filter_data = request('filter_data');
        // return $filter_data;
        $offset = ($page - 1) * 12;
        $slug_category_name = request('category_name');
        $category = Category::where('slug', $slug_category_name)->firstOrFail();
        $sub_categories = Category::where('top_id', $category->id)->get();
        $cat_id = [$category->id];
        for($i=0; $i<count( $sub_categories ); $i++){
            array_push($cat_id, $sub_categories[$i]->id);
        }
        $count = 0;
        $products = [];
        if(!$filter_data){
            $count = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                ->whereIn('category_product.category_id', $cat_id)
                ->count();

            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                ->whereIn('category_product.category_id', $cat_id)
                ->offset($offset)
                ->take(12)
                ->get();
        }
        else{
            $type = $filter_data[0];
            if($type == 'brand_filter'){
                $id = $filter_data[1];

                $count = Product::select('product.*')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('brand_product.brand_id', $id)
                    ->orderBy('product.updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('brand_product.brand_id', $id)
                    ->orderBy('product.updated_at', 'desc')
                    ->offset($offset)
                    ->limit(12)
                    ->get();

            }
            elseif($type == 'size_filter'){
                $id = $filter_data[1];
                $count = Product::select('product.*')
                    ->leftJoin('size_product', 'size_product.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('size_product.size_id', $id)
                    ->orderBy('product.updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('size_product', 'size_product.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('size_product.size_id', $id)
                    ->orderBy('product.updated_at', 'desc')
                    ->offset($offset)
                    ->limit(12)
                    ->get();

            }
            elseif($type == 'color_filter'){
                $id = $filter_data[1];
                $count = Product::select('product.*')
                    ->leftJoin('color_product', 'color_product.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('color_product.color_id', $id)
                    ->orderBy('product.updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('color_product', 'color_product.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('color_product.color_id', $id)
                    ->orderBy('product.updated_at', 'desc')
                    ->offset($offset)
                    ->limit(12)
                    ->get();
            }
            elseif($type == 'price_filter'){
                $minmax_price = $filter_data[1];
                $min_price = $minmax_price[0];
                $max_price = $minmax_price[1];
                $count = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('price_list.sale_price', '<=', $max_price)
                    ->where('price_list.sale_price', '>=', $min_price)
                    ->orderBy('product.updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->where('price_list.sale_price', '<=', $max_price)
                    ->where('price_list.sale_price', '>=', $min_price)
                    ->orderBy('product.updated_at', 'desc')
                    ->offset($offset)
                    ->limit(12)
                    ->get();
            }
            elseif($type == 'category_sorting'){
                $sorting_name = $filter_data[1];
                $order = $filter_data[2];
                $count = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->orderBy($sorting_name, $order)
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->whereIn('category_product.category_id', $cat_id)
                    ->orderBy($sorting_name, $order)
                    ->offset($offset)
                    ->limit(12)
                    ->get();
            }
        }


        $pagination = ceil($count/12);
        return view('user.pages.shop_product', compact('products', 'count', 'page', 'pagination'));
    }

    public function categories ()  {
        $categories = Category::all();
        return view('user.pages.shop', compact('categories'));
    }

}
