<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatus;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\StockList;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('manage.pages.order.index');
    }
    public function index_data()
    {
        $rows = Order::select(['order.*', DB::raw("CONCAT(order.first_name,' ',order.last_name) as name")]);
        return DataTables::eloquent($rows)
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(order.first_name,' ',order.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(order.first_name,' ',order.last_name,' ',order.status)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('SP', function ($row) {
                return 'SP-' . $row->id;

            })
            ->editColumn('export', function ($row) {
                $class = $row->exported == 1 ? 'primary' : 'default';
                $name = $row->exported == 1 ? 'İxrac dilib' : 'İxrac edilməyib';
                return '<a href="' . route("manage.order.exported", $row->id) . '" class="btn btn-xs btn-' . $class . '">' . $name . '</a>';

            })
            ->editColumn('status', function ($row) {
                return __('content.' . $row->status);

            })
            ->addColumn('action', function ($row) {
                
                return '<div>
                        <a href="' . route("manage.order.edit", $row->id) .'" class="btn btn-xs btn-success" data-id="' . $row->id .'">' . __('admin.Edit') . '
                        <span class="fa fa-pencil"></span></a>
                        <a href="'.route('manage.order.delete', $row->id) . '" class="btn btn-xs btn-danger"  id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="' . $row->id . '" />';
            })
            ->rawColumns(['checkbox', 'action', 'SP', 'export'])
            ->toJson();
    }

    public function form($id = 0)
    {
        if ($id > 0) {
            $entry = Order::with('cart.cart_products.product')->find($id);
        }

        return view('manage.pages.order.form', compact('entry'));
    }

    public function save($id = 0)
    {

        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);
        $cart_id = request('cart_id');
        $user_id = Cart::select('user_id')->where('id', $cart_id)->first();
        $user_id = $user_id->user_id;
        $user = User::where('id', $user_id)->first();

        $data = request()->only('first_name', 'last_name', 'address', 'phone', 'mobile', 'status');
        if ($id > 0) {
            $entry = Order::where('id', $id)->firstOrFail();
            if(request('status') == 'Order completed'){
                $cartProduct = CartProduct::select('product_id', 'piece')->where('cart_id', $cart_id)->get();
                foreach ($cartProduct as $value) {
                    $product = Product::where('id', $value->product_id)->first();
                    if($product){
                        $stock = StockList::where('product_id', $product->id)->where('color_id', $value->color_id)->where('size_id', $value->size_id)->first();
                        $stock->update([
                            'stock_piece' => $stock->stok_piece - $value->piece
                        ]);
                    }
                }
            }
            elseif($entry->status == 'Order completed' && request('status') == 'Your order is canceled'){
                $cartProduct = CartProduct::select('product_id', 'piece')->where('cart_id', $cart_id)->get();
                foreach ($cartProduct as $value) {
                    $product = Product::where('id', $value->product_id)->first();
                    if($product){
                        $stock = StockList::where('product_id', $product->id)->where('color_id', $value->color_id)->where('size_id', $value->size_id)->first();
                        $stock->update([
                            'stock_piece' => $stock->stok_piece + $value->piece
                        ]);
                    }
                }
            }
            $entry->update($data);
        }
        $order = Order::with('cart.cart_products.product')->find($id);
        Mail::to($user->email)->send(new OrderStatus($order));
        return redirect()
            ->route('manage.order.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', __('admin.Updated'));
    }

    public function delete($id)
    {
        $order = Order::where('id', $id)->first();
        $cart_id = $order->cart_id;
        if ($id > 0 && $order->status == "Order completed") {
            $cartProduct = CartProduct::select('product_id', 'piece')->where('cart_id', $cart_id)->get();
            foreach ($cartProduct as $value) {
                $product = Product::where('id', $value->product_id)->first();
                if($product){
                    $stock = StockList::where('product_id', $product->id)->where('color_id', $value->color_id)->where('size_id', $value->size_id)->first();
                    $stock->update([
                        'stock_piece' => $stock->stok_piece + $value->piece
                    ]);
                }

            }
        }
        Order::destroy($id);

        return redirect()
            ->route('manage.order')
            ->with('message_type', 'success')
            ->with('message', __('admin.The order deleted'));
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $order = Order::whereIn('id', $id_array)->first();
        $cart_id = $order->cart_id;
        if ($request->input('id') > 0) {
            $cartProduct = CartProduct::select('product_id', 'piece')->where('cart_id', $cart_id)->get();
            if($cartProduct){
                foreach ($cartProduct as $value) {
                    $product = Product::where('id', $value->product_id)->first();
                    if($product){
                        $stock = StockList::where('product_id', $product->id)->where('color_id', $value->color_id)->where('size_id', $value->size_id)->first();
                        $stock->update([
                            'stock_piece' => $stock->stok_piece + $value->piece
                        ]);
                    }
                }
            }

        }

        $rows = Order::whereIn('id', $id_array);
        if ($rows->forceDelete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function invoice_view(){
        $order = Order::with('cart.cart_products.product')->find(request('id'));
        $user = User::where('id', $order->cart->user_id)->first();
        $data =[
            'total_amount' => $order->order_amount,
            'order_status' => $order->order_status,
            'order_date' => $order->created_at,
            'payment_date' => '',
            'payment_type' => $order->bank,
            'client_firstname' => $order->first_name,
            'client_lastname' => $order->last_name,
            'client_email' => $user->email,
            'client_tel' => $order->mobile,
            'client_address' => $order->address,
            'discount' => '',
            'order_items' => $order->cart->cart_products,
        ];

        return view('common.invoices.default', $data);
    }
    public function exported($id){
        $order = Order::find($id);
        
        if($order->exported == 1){
            Order::where('id',  $id)->update(['exported' => 0]);
        }
        else{
            Order::where('id',  $id)->update(['exported' => 1]);
        }
        
        return back();
    }
}
