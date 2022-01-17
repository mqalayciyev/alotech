<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Depot;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class MenuController extends Controller
{
    public function last_view() {
        return view('user.pages.last_view');
    }

    public function best_selling() {
        return view('user.pages.best_selling');
    }

    public function deal_of_day() {
        return view('user.pages.deal_of_day');
    }
    public function products() {
        $depot = Cookie::get('depot')  ? Cookie::get('depot') : Depot::where('default', 1)->first()->id;
        $page = request('page');
        $filter_data = request('filter_data');
        // return $filter_data;
        $offset = ($page - 1) * 12;
        $page_type = request('page_type');

        $count = 0;
        $products = [];
        if($page_type == "best_selling"){
            $count = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                ->orderBy('product.best_selling', 'desc')
                ->count();
            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                ->orderBy('product.best_selling', 'desc')
                ->offset($offset)
                ->limit(12)
                ->get();
        }
        elseif($page_type == "deal_of_day"){
            $count = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                ->where('product.discount', '!=', null)
                ->orderBy('updated_at', 'desc')
                ->count();
            $products = Product::select('product.*')
                ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                ->where('product.discount', '!=', null)
                ->orderBy('updated_at', 'desc')
                ->offset($offset)
                ->limit(12)
                ->get();
        }
        elseif($page_type == "last_view"){
            if (session()->has('your_products')) {
                $your_products = explode("-", session('your_products'));
                // return $your_products;
                $count = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                    ->whereIn('product.id', $your_products)
                    ->orderBy('updated_at', 'desc')
                    ->count();
                $products = Product::select('product.*')
                    ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
                    ->leftJoin('price_list', 'price_list.product_id', 'product.id')
                ->where('price_list.depot_id', $depot)
                ->groupBy('product.id')
                    ->whereIn('product.id', $your_products)
                    ->orderBy('updated_at', 'desc')
                    ->offset($offset)
                    ->limit(12)
                    ->get();
            }
        }

        $pagination = ceil($count/12);
        return view('user.pages.shop_product', compact('products', 'count', 'page', 'pagination'));
    }

}
