<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\Color;
use App\Models\Depot;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('user.pages.brands', compact('brands'));
    }
    public function brands($brand_slug){
        $depot = Cookie::get('depot')  ? Cookie::get('depot') : Depot::where('default', 1)->first()->id;
        $brands = Brand::select('brand.*')
            ->leftJoin('brand_product', 'brand_product.brand_id', 'brand.id')
            ->leftJoin('product', 'product.id', 'brand_product.product_id')
            ->leftJoin('price_list', 'price_list.product_id', 'product.id')
            ->where('price_list.depot_id', $depot)
            ->orderBy('brand.name', 'asc')
            ->groupBy('brand.id')
            ->get();

        $brands_count = array();

        for($i=0; $i<count($brands); $i++){
            $productBrand = ProductBrand::select('brand_product.*')
                ->leftJoin("product", 'product.id', 'brand_product.product_id')
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->where('brand_id', $brands[$i]->id)
                ->groupBy('product.id')
                ->get();
            $item = ['id' => $brands[$i]->id, 'count' => count($productBrand)];
            array_push($brands_count, $item);
        }
        $brand = Brand::where('slug', $brand_slug)->first();

        $colors = Color::select('color.*')
            ->leftJoin('color_product', 'color_product.color_id', 'color.id')
            ->leftJoin('brand_product', 'brand_product.product_id', 'color_product.product_id')
            ->leftJoin('price_list', 'price_list.product_id', 'color_product.product_id')
            ->where('price_list.depot_id', $depot)
            ->where('brand_product.brand_id', $brand->id)
            ->groupBy('color.name')
            ->get();
        $sizes = Size::select('size.*')
            ->leftJoin('size_product', 'size_product.size_id', 'size.id')
            ->leftJoin('brand_product', 'brand_product.product_id', 'size_product.product_id')
            ->leftJoin('price_list', 'price_list.product_id', 'size_product.product_id')
            ->where('price_list.depot_id', $depot)
            ->where('brand_product.brand_id', $brand->id)
            ->groupBy('size.name')
            ->get();

        $brand_name = $brand->name;
        return view('user.pages.brand_product', compact('brands', 'brand_slug', 'brand_name', 'brands_count', 'colors', 'sizes'));
    }
    public function products()
    {
        $depot = Cookie::get('depot')  ? Cookie::get('depot') : Depot::where('default', 1)->first()->id;
        $page = request('page');
        $filter_data = request('filter_data');
        $offset = ($page - 1) * 12;
        $brand_slug = request('brand_slug');

        $count = 0;
        $products = [];
        if(!$filter_data){
            $count = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                ->where('brand.slug', "LIKE", '%'.$brand_slug.'%')
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                ->count();
            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                ->where('brand.slug', "LIKE", '%'.$brand_slug.'%')
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                ->offset($offset)
                ->take(12)
                ->get();
        }
        else{
            $type = $filter_data[0];
            if($type == 'size_filter'){
                $id = $filter_data[1];
                $count = Product::select('product.*')
                    ->leftJoin('size_product', 'size_product.product_id', 'product.id')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('brand.slug', $brand_slug)
                    ->where('size_product.size_id', $id)
                    ->where('product.depot', $depot)
                    ->orderBy('product.updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('size_product', 'size_product.product_id', 'product.id')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('brand.slug', $brand_slug)
                    ->where('size_product.size_id', $id)
                    ->where('product.depot', $depot)
                    ->orderBy('product.updated_at', 'desc')
                    ->offset($offset)
                    ->limit(12)
                    ->get();

            }
            elseif($type == 'color_filter'){
                $id = $filter_data[1];
                $count = Product::select('product.*')
                    ->leftJoin('color_product', 'color_product.product_id', 'product.id')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('brand.slug', $brand_slug)
                    ->where('color_product.color_id', $id)
                    ->where('product.depot', $depot)
                    ->orderBy('product.updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('color_product', 'color_product.product_id', 'product.id')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('brand.slug', $brand_slug)
                    ->where('color_product.color_id', $id)
                    ->where('product.depot', $depot)
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
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('sale_price', '<=', $max_price)
                    ->where('sale_price', '>=', $min_price)
                    ->where('brand.slug', $brand_slug)
                    ->where('product.depot', $depot)
                    ->orderBy('product.updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('category_product', 'category_product.product_id', 'product.id')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('sale_price', '<=', $max_price)
                    ->where('sale_price', '>=', $min_price)
                    ->where('brand.slug', $brand_slug)
                    ->where('product.depot', $depot)
                    ->orderBy('product.updated_at', 'desc')
                    ->offset($offset)
                    ->limit(12)
                    ->get();
            }
            elseif($type == 'brand_sorting'){
                $sorting_name = $filter_data[1];
                $order = $filter_data[2];
                $count = Product::select('product.*')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('brand.slug', $brand_slug)
                    ->where('product.depot', $depot)
                    ->orderBy($sorting_name, $order)
                    ->groupBy('product.id')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                    ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                    ->where('brand.slug', $brand_slug)
                    ->where('product.depot', $depot)
                    ->orderBy($sorting_name, $order)
                    ->groupBy('product.id')
                    ->offset($offset)
                    ->limit(12)
                    ->get();
            }
        }


        $pagination = ceil($count/12);
        return view('user.pages.shop_product', compact('products', 'count', 'page', 'pagination'));
    }
}
