<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(){
        return view('user.pages.wishlist');
    }
    public function add_wish_list(){
        if(!auth()->user()){
            return response()->json(['status'  => 'error', 'message' => 'Məhsulu istəklərim siyahısına əlavə etmək üçün giriş etməlisiniz']);
        }
        $product_id = request()->get('id');
        $user_id = auth()->id();
        $add = new WishList();
        $count = WishList::where('product_id', $product_id)->where('user_id', $user_id)->count();
        $message = '';
        if($count > 0){
            $message = "Bu məhsul artıq istəklərim siyahısına əlavə edilib.";
        }
        else
        {
            $add->user_id = $user_id;
            $add->product_id = $product_id;
            $add->save();
            $message = "Məhsul istəklərim siyahısına əlavə edildi.";
        }
        return response()->json(['status'  => 'success', 'message' => $message]);

    }
    public function view_my_wish_list(){
        $user_id = auth()->id();
        $wish_lists = WishList::select('product_id')->where('user_id', $user_id)->get();
         $page = 1;
        if(request()->get('page')){
            $page = request()->get('page');
        }
        $offset = ($page - 1) * 12;
        $id_array = [];
        
        for($i=0; $i<count($wish_lists); $i++){
            array_push($id_array, $wish_lists[$i]->product_id);
        }
        
        $count = Product::select('product.*')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->whereIn('product.id', $id_array)
            ->count();
        $products = Product::select('product.*')
            ->leftJoin('product_detail', 'product_detail.product_id', 'product.id')
            ->whereIn('product.id', $id_array)
            ->offset($offset)
            ->limit(12)
            ->get();


        $pagination = ceil($count/12);
        return view('user.pages.shop_product', compact('products', 'count', 'page', 'pagination'));
    }
    public function remove_wish_list(){
        $user_id = auth()->id();
        $product_id = request()->get('id');
        WishList::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        return response()->json(['status'  => 'success', 'message' => 'Məhsul istəklərim siyahısıdan silindi']);
    }
}
