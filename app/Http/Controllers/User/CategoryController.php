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
use Mockery\Undefined;

class CategoryController extends Controller
{
    public function index($slug_category_name)
    {
        $category = Category::where('slug', $slug_category_name)->firstOrFail();
        $current_id = $category->id;
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
            ->groupBy('brand.id')
            ->get();
        $brands_count = array();
        for($i=0; $i< count($brands); $i++){

            $productBrand = ProductBrand::select('brand_product.*')
                ->leftJoin("product", 'product.id', 'brand_product.product_id')
                ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                ->whereIn('category_product.category_id', $cat_id)
                ->where('brand_id', $brands[$i]->id)
                ->groupBy('product.id')
                ->get();

            $item = ['id' => $brands[$i]->id, 'count' => count($productBrand)];
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



        return view('user.pages.category', compact('category', 'current_id', 'sub_categories', 'brands', 'slug_category_name', 'brands_count', 'sub_categories_count', 'colors', 'sizes'));
    }

    public function products()
    {
        $page = request('page');
        $filter_data = request('filter_data');
        
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
            $brands = isset($filter_data['brands']) ? $filter_data['brands'] : null;
            $colors = isset($filter_data['colors']) ? $filter_data['colors'] : null;
            $sizes = isset($filter_data['sizes']) ? $filter_data['sizes'] : null;
            $sorting = isset($filter_data['sorting']) ? $filter_data['sorting'] : null;

            $query = Product::with(['brands', 'colors', 'sizes', 'categories']);

            $query->whereHas('categories', function($q) use ($cat_id) {
                $q->whereIn('category.id', $cat_id);
            });

            if($brands){
                $query->whereHas('brands', function($q) use ($brands) {
                    $q->whereIn('brand.id', $brands);
                });
            }
            if($colors){
                $query->whereHas('colors', function($q) use ($colors) {
                    $q->whereIn('color.id', $colors);
                });
            }
            if($sizes){
                $query->whereHas('sizes', function($q) use ($sizes) {
                    $q->whereIn('size.id', $sizes);
                });
            }
            if($sorting){
                if($sorting['sorting_name'] == 'created_at'){
                    $query->orderBy($sorting['sorting_name'], $sorting['order']);
                }
                else{
                    $query->join('price_list', 'price_list.product_id', 'product.id')
                        ->orderBy('price_list.' . $sorting['sorting_name'], $sorting['order'])
                        ->groupBy('product.id');
                }
                
            }
            $count = $query->count();
            
            $products = $query->offset($offset)->limit(12)->get();

        }


        $pagination = ceil($count/12);
        return view('user.pages.shop_product', compact('products', 'count', 'page', 'pagination'));
    }

    public function categories ()  {
        $categories = Category::all();
        return view('user.pages.shop', compact('categories'));
    }

}
