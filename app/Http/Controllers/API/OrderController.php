<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orders = Order::select([
            'order.id', 
            'order.order_amount', 
            'order.status', 
            'order.first_name', 
            'order.last_name', 
            'order.email', 
            'order.address', 
            'order.phone', 
            'order.mobile', 
            'order.city', 
            'order.zip_code', 
            'order.bank as payment_method', 
            'order.card', 
            'order.exported', 
            'order.tran_date_time', 
            'order.brand',
            'order.created_at',
            'order.installment_number', 
            DB::raw('CONCAT("[", GROUP_CONCAT(DISTINCT JSON_OBJECT("code" , product.product_code, "color_code", color.name, "color_name", color.title  , "size", size.name, "qty",cart_product.piece, "price",cart_product.amount)), "]") AS order_items')])
            ->leftJoin('cart', 'cart.id', 'order.cart_id')
            ->leftJoin('cart_product', 'cart_product.cart_id', 'cart.id')
            ->leftJoin('product', 'product.id', 'cart_product.product_id')
            ->leftJoin('color', 'color.id', 'cart_product.color_id')
            ->leftJoin('size', 'size.id', 'cart_product.size_id')
            ->groupBy('order.id')
            ->where('order.exported', 0)
            ;
        $response = $orders->get();
        // $orders->update(['exported' => 1]);
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }
}
