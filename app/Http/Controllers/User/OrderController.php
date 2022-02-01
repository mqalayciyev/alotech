<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\OrderReturn;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('order.*')->leftJoin('cart', 'cart.id', 'order.cart_id')->where('cart.user_id', auth()->id())->orderByDesc('order.created_at')->get();
        
        return view('user.pages.orders', compact('orders'));
    }

    public function detail($id)
    {
        // $order = Order::with('cart.cart_products.product')->where('order.id', $id)->firstOrFail();
        $order = Order::select('order.*')->leftJoin('cart', 'cart.id', 'order.cart_id')->where('cart.user_id', auth()->id())->where('order.id', $id)->firstOrFail();

        return view('user.pages.order', compact('order'));
    }
    public function return()
    {
        $messages = [
            'description.required' => 'Mətn daxil edilməyib',
            'description.min' => 'Sifarişi qaytarma səbəbinizi ətraflı yazın',
            'order_id.required' => 'Sifariş məlumatı təyin edilə bilmədi.',
            'user_id.required' => 'İstifadəçi məlumatı təyin edilə bilmədi.',
        ];

        $validator = Validator::make(request()->all(), [
            'order_id' => 'required',
            'user_id' => 'required',
            'description' => 'required|min:10'
        ], $messages);
        if ($validator->fails()) {
            return response()->json(['status' => 'warning', 'message' => $validator->errors()]);
        }

        $data = request()->only('order_id', 'user_id', 'description');

        OrderReturn::create($data);

        return response()->json(['status' => 'success', 'message' => 'Tələbiniz tərəfimizdən dəyərləndirildikdən sonra sizinlə əlaqə saxlanılacaq']);
    }
}
