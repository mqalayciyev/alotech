<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('user.pages.brands', compact('brands'));
    }
    public function brands($brand_slug){
        $brands = Brand::select('brand.*')
            ->leftJoin('brand_product', 'brand_product.brand_id', 'brand.id')
            ->leftJoin('product', 'product.id', 'brand_product.product_id')
            ->orderBy('brand.name', 'asc')
            ->groupBy('brand.id')
            ->get();

        $brands_count = array();

        for($i=0; $i<count($brands); $i++){
            $productBrand = ProductBrand::select('brand_product.*')
                ->leftJoin("product", 'product.id', 'brand_product.product_id')
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
            ->where('brand_product.brand_id', $brand->id)
            ->groupBy('color.name')
            ->get();
        $sizes = Size::select('size.*')
            ->leftJoin('size_product', 'size_product.size_id', 'size.id')
            ->leftJoin('brand_product', 'brand_product.product_id', 'size_product.product_id')
            ->where('brand_product.brand_id', $brand->id)
            ->groupBy('size.name')
            ->get();

        $brand_name = $brand->name;
        return view('user.pages.brand_product', compact('brands', 'brand_slug', 'brand_name', 'brands_count', 'colors', 'sizes'));
    }
    public function products()
    {
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
                ->groupBy('product.id')
                ->count();
            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('brand_product', 'brand_product.product_id', 'product.id')
                ->leftJoin('brand', 'brand.id', 'brand_product.brand_id')
                ->where('brand.slug', "LIKE", '%'.$brand_slug.'%')
                ->groupBy('product.id')
                ->offset($offset)
                ->take(12)
                ->get();
        }
        else{

            $colors = isset($filter_data['colors']) ? $filter_data['colors'] : null;
            $sizes = isset($filter_data['sizes']) ? $filter_data['sizes'] : null;
            $sorting = isset($filter_data['sorting']) ? $filter_data['sorting'] : null;

            $query = Product::with(['brands', 'colors', 'sizes', 'price', 'categories']);

            $query->whereHas('brands', function($q) use ($brand_slug) {
                $q->where('brand.slug', $brand_slug);
            });

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
}
