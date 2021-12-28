<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart as CartModel;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ColorProduct;
use App\Models\SizeProduct;
use App\Models\StockList;
use App\Models\PriceList;
use App\Models\Color;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        // Cart::destroy();
        return view('user.pages.cart');
    }

    public function my_cart()
    {
        $output = '';
        if (count(Cart::content()) > 0) {
            $output .= '<div class="ps-section__header">
            <h1>Sifarişlər</h1>
        </div>
        <div class="ps-section__content">
            <div class="table-responsive">
                <table class="table ps-table--shopping-cart ps-table--responsive">
                    <thead>
                        <tr>
                            <th>Məhsulun adı</th>
                            <th>QİYMƏT</th>
                            <th>MİQDAR</th>
                            <th>ÜMUMİ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >';
            foreach (Cart::content() as $productCartItem) {

                $color = '';
                if($productCartItem->options->color > 1){
                    $colors = Color::where('id', $productCartItem->options->color)->firstOrFail();
                    $color = '<span style="background-color: ' . $colors->name . '">' . $colors->title .'</span>' ;
                }
                $size = '';
                if($productCartItem->options->size > 0){
                    $sizes = Size::where('id', $productCartItem->options->size)->firstOrFail();
                    $size = $sizes->name ;
                }
                // $stok_piece = Product::select('stok_piece')->where('id', $productCartItem->id)->first();
                $output .= '<tr><td data-label="Məhsul"><div class="ps-product--cart">';
                $output .= '<div class="ps-product__thumbnail"><a href=' . route('product', $productCartItem->options->slug) . '><img src="';
                $output .= $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png');

                $output .='" alt=""></a></div>
                    <div class="ps-product__content">
                        <a href=' . route('product', $productCartItem->options->slug) . '>' . $productCartItem->name . ' ' . $size . ' ' . $color . '</a>
                    </div>
                </div>
            </td>
            <td class="price" data-label="Qiymət">' . $productCartItem->price . '‎ ₼</td>

            <td data-label="Miqdarı">
                <div class="form-group--number ProductQuantity">
                    <button type="button" class="ProductQuantity-Plus up">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="ProductQuantity-Minus down " >
                        <i class="fa fa-minus"></i>
                    </button>
                    <input
                        type="number"
                        min="1"
                        name="piece"
                        value="' . $productCartItem->qty . '"
                        data-id="' . $productCartItem->rowId . '"
                        data-product="'. $productCartItem->id .'"
                        data-sale-price="'. $productCartItem->price .'"
                        step="1"
                        autocomplete="off"
                        class="ProductQuantity-Input form-control input"
                    />
                </div>
            </td>
            <td data-label="Ümumi">' . $productCartItem->price * $productCartItem->qty . '‎ ₼</td>
            <td data-label="Sil"><a href="javascript:void(0)" id="' . $productCartItem->rowId . '" class="delete Remove"><i class="icon-cross"></i></a></td>
        </tr>';
            }
            $output .= '</tbody>
                    </table>
                </div>
                <div>
                <span>Ümumi qiymət:</span> <b class="total">' . Cart::total() . ' ₼</b
                ></div>
                <div class="ps-section__cart-actions">
                    <a class="ps-btn " href="' . route('payment') . '"> ' . __('content.Place Order') . '</a>

                </div>
            </div>';
        } else {
            $output .= '<div data-v-59955730="" class="LayoutMP-Main"><div data-v-0faeac38="" data-v-59955730="" class="Wrapper">
            <div data-v-0faeac38="" class="EmptyCart"><i data-v-0faeac38="" class="fa fa-shopping-bag"></i>
            <span data-v-0faeac38="">Səbətinizdə heç bir məhsul yoxdur</span></div></div></div>';
        }

        return $output;
    }

    public function update_cart()
    {

        $piece = request()->get('piece');
       
        // $product = request()->get('product');

        $rowID = request()->get('rowID');
        $product = Product::find(request()->get('product'));
        $sale_price = request()->get('sale_price');


        
        $cart = Cart::get($rowID);
        $price = $cart->options->sale_price;
        $priceList = PriceList::find($cart->options->price_id);
        $wholesale_count = $priceList->wholesale_count;
        $wholesale_price = $priceList->wholesale_price;
        $stock = StockList::where('product_id', $product->id)->where('color_id', $cart->options->color)->where('size_id', $cart->options->size)->first();
        
        if($piece > $stock->stock_piece){
            $piece = $stock->stock_piece;
        }
        
        if($wholesale_count > 0 && $piece >= $wholesale_count){
            $sale_price = $wholesale_price;
        }
        else{
            $sale_price = $price;

        }
        if($piece <= 0){
            $piece = 1;
        }

        Cart::update($rowID, ['qty' => $piece, 'price' => $sale_price]);
        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            CartProduct::updateOrCreate(
                ['cart_id' => $active_cart_id, 'product_id' => $product->id],
                ['piece' => $piece, 'amount' => $sale_price, 'cart_status' => 'Pending']
            );
        }

        if (count(Cart::content()) > 0) {

            $output = '<div class="ps-cart__items">';
            foreach (Cart::content() as $productCartItem) {

                $color = '';
                if($productCartItem->options->color > 1){
                    $colors = Color::where('id', $productCartItem->options->color)->firstOrFail();
                    $color = '<span style="background-color: ' . $colors->name . '">' . $colors->name .'</span>' ;
                }
                $size = '';
                if($productCartItem->options->size > 0){
                    $sizes = Size::where('id', $productCartItem->options->size)->firstOrFail();
                    $size = '<span>' . $sizes->name .'</span>';
                }

                $output .= '<div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail">
                                    <a href="#">
                                        <img src="';
                $output .= $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png');
                $output .= '" alt=""></a></div>
                <div class="ps-product__content"><a href="' . route('product', $productCartItem->options->slug) . '">' . $productCartItem->name . ' ' . $size . ' ' . $color . '</a>

                <p>
                    <small>' . $productCartItem->qty . ' x ' . $productCartItem->price . ' ₼</small>
                </p>
                </div>
            </div>';
            }
            $output .= '</div><div class="ps-cart__footer">
                            <h3>Ümumi: <strong>'. Cart::total() .'₼</strong></h3>
                            <figure><a class="ps-btn btn-block text-center" href="'. route('cart') .'">Səbətə Bax</a></figure>
                        </div>';
        }
        else{
            $output = '<div class="ps-cart__items">
                            <h4 class="text-center">'.
                            __('header.Empty, there is no product') .'
                            </h4>
                        </div>';
        }

        $cart_count = Cart::count();

        $data = array(
            'output' => $output,
            'cart_count' => $cart_count,
        );

        echo json_encode($data);
        // $cart_count = Cart::count();
        // echo $cart_count;
    }

    public function add_to_cart()
    {
        
        $piece = request()->get('piece');
        $priceId = request()->get('priceId');
        if(!$priceId){
            $priceId = PriceList::where('product_id', request()->get('id'))->where('default_price', 1)->first()->id;
        }
        $amount = request()->get('amount');
        $size = request()->get('size');
        $color = request()->get('color');
        if(!$color){
            $color = 1;
        }
        $product = Product::find(request()->get('id'));
        
        $stock = StockList::where('product_id', $product->id)->where('color_id', $color)->where('size_id', $size)->first();

        if(!$stock){
            return response()->json(['status' => 'error', 'message' => 'Məhsul stokda yoxdur']);
        }
        else{
            if($piece > $stock->stock_piece){
                return response()->json(['status' => 'error', 'message' => 'Seçilən say stok sayından çoxdur']);
            }
        }
        // return session()->get('cart');
        $cart = session()->get('cart');

        if($cart){
            $cart_content = $cart['default'];
            $qty = 0;
            foreach ($cart_content as $key => $item) {
                if($item->id == request()->get('id') && $item->options->color == $color && $item->options->size == $size){
                    $qty = $item->qty;
                    
                    break;
                }
            }
            if($qty + $piece > $stock->stock_piece){
                return response()->json(['status' => 'error', 'message' => 'Bu məhsul üçün maksimum səbət sayı ' . $stock->stock_piece . ' ola bilər']);
            }
        }

        $price = $amount;
        $discount = $product->discount;
        $priceList = PriceList::find($priceId);
        $wholesale_count = $priceList->wholesale_count;
        $wholesale_price = $priceList->wholesale_price;
        
        if($wholesale_count > 0 && $piece >= $wholesale_count){
            $price = $wholesale_price;
        }

        $qty = $piece;
        $rowId = null;
        if (count(Cart::content()) > 0) {
            foreach (Cart::content() as $item) {
                if($item->id == request()->get('id') && $item->options->color == $color && $item->options->size == $size){
                    $qty += $item->qty;
                    $rowId = $item->rowId;
                    
                }
            }
        }
        
        
        if($wholesale_count > 0 && $qty >= $wholesale_count){
            $price = $wholesale_price;
        }
        $image = ProductImage::where('product_id', $product->id)->where('color_id', $color)->first();
        
        if($image){
            $img = $image->main_name;
        }
        else{
            $img = $product->image->main_name;
        }
        if($rowId){
           $cartItem = Cart::update($rowId, ['qty' => $qty, 'price' => $price]);
        }
        else{
            $cartItem = Cart::add($product->id, $product->product_name, $piece, $price, ['slug' => $product->slug, 'sale_price' => $price, 'price_id' => $priceId, 'discount' => $discount, 'image' => $img, 'color'=> $color, 'size' => $size]);
        }
        
        
       
        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            
            if (!isset($active_cart_id)) {
                $active_cart = CartModel::create([
                    'user_id' => auth()->id()
                ]);
                $active_cart_id = $active_cart->id;
                session()->put('active_cart_id', $active_cart_id);
            }
            // return $active_cart_id;
            CartProduct::updateOrCreate(
                ['cart_id' => $active_cart_id, 'product_id' => $product->id, 'size_id' => $size, 'color_id' => $color],
                ['piece' => $cartItem->qty, 'amount' => $cartItem->price, 'price_id' => $priceId, 'cart_status' => 'Pending', 'sale_price' => $cartItem->options->sale_price]
            );
            // return 'ok';
        }

        if (count(Cart::content()) > 0) {

            $output = '<div class="ps-cart__items">';
            foreach (Cart::content() as $productCartItem) {

                $color = '';
                if($productCartItem->options->color > 1){
                    $colors = Color::where('id', $productCartItem->options->color)->firstOrFail();
                    $color = '<span style="background-color: ' . $colors->name .'">' . $colors->title . '</span>';
                }
                $size = '';
                if($productCartItem->options->size > 0){
                    $sizes = Size::where('id', $productCartItem->options->size)->firstOrFail();
                    $size = '<span>Ölçü: '.$sizes->name . '</span>';
                }

                $output .= '<div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail">
                                    <a href="#">
                                        <img src="';
                $output .= $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png');
                $output .= '" alt=""></a></div>
                <div class="ps-product__content"><a href="' . route('product', $productCartItem->options->slug) . '">' . $productCartItem->name . ' ' . $size . ' ' . $color .'</a>
                
                <p>
                    <small>' . $productCartItem->qty . ' x ' . $productCartItem->price . ' ₼</small>
                </p>
                </div>
            </div>';
            }
            $output .= '</div><div class="ps-cart__footer">
                            <h3>Ümumi: <strong>'. Cart::total() .'₼</strong></h3>
                            <figure><a class="ps-btn btn-block text-center" href="'. route('cart') .'">Səbətə Bax</a></figure>
                        </div>';
        }
        else{
            $output = '<div class="ps-cart__items">
                            <h4 class="text-center">'.
                            __('header.Empty, there is no product') .'
                            </h4>
                        </div>';
        }

        $cart_count = Cart::count();


        return response()->json(['status'  => 'success', 'message' => 'Məhsul səbətə əlavə edildi', 'output' => $output, 'cart_count' => $cart_count]);

    }

    public function delete()
    {
        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            $cartItem = Cart::get(request()->get('rowID'));
            CartProduct::where('cart_id', $active_cart_id)->where('product_id', $cartItem->id)->delete();
        }
        Cart::remove(request()->get('rowID'));

        if (count(Cart::content()) > 0) {

            $output = '<div class="ps-cart__items">';
            foreach (Cart::content() as $productCartItem) {

                $color = '';
                if($productCartItem->options->color > 1){
                    $colors = Color::where('id', $productCartItem->options->color)->firstOrFail();
                    $color = '<span style="background-color: ' . $colors->name .'">' . $colors->title . '</span>';
                }
                $size = '';
                if($productCartItem->options->size > 0){
                    $sizes = Size::where('id', $productCartItem->options->size)->firstOrFail();
                    $size = '<span>Ölçü: '.$sizes->name . '</span>';
                }

                $output .= '<div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail">
                                    <a href="#">
                                        <img src="';
                $output .= $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png');
                $output .= '" alt=""></a></div>
                <div class="ps-product__content"><a href="' . route('product', $productCartItem->options->slug) . '">' . $productCartItem->name . ' ' . $size . ' ' . $color .'</a>
                
                <p>
                    <small>' . $productCartItem->qty . ' x ' . $productCartItem->price . ' ₼</small>
                </p>
                </div>
            </div>';
            }
            $output .= '</div><div class="ps-cart__footer">
                            <h3>Ümumi: <strong>'. Cart::total() .'₼</strong></h3>
                            <figure><a class="ps-btn btn-block text-center" href="'. route('cart') .'">Səbətə Bax</a></figure>
                        </div>';
        }
        else{
            $output = '<div class="ps-cart__items">
                            <h4 class="text-center">'.
                            __('header.Empty, there is no product') .'
                            </h4>
                        </div>';
        }

        $cart_count = Cart::count();


        return response()->json(['status'  => 'success', 'message' => 'Məhsul səbətə əlavə edildi', 'output' => $output, 'cart_count' => $cart_count]);
    }

    public function destroy()
    {
        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            CartProduct::where('cart_id', $active_cart_id)->delete();
        }
        Cart::destroy();
    }

    public function update($rowid)
    {
        $validator = Validator::make(request()->all(), [
            'piece' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('message_type', 'danger');
            session()->flash('message', __('content.The number must be between 1 and 10'));
            return response()->json(['success' => false]);
        }

        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            $cartItem = Cart::get($rowid);
            if (request('piece') == 0) {
                CartProduct::where('cart_id', $active_cart_id)->where('product_id', $cartItem->id)->delete();
            } else {
                CartProduct::where('cart_id', $active_cart_id)->where('product_id', $cartItem->id)->
                update(['piece' => request('piece')]);
            }
        }

        Cart::update($rowid, request('piece'));
        session()->flash('message_type', 'success');
        session()->flash('message', __('content.Piece info updated'));
        return route('cart');
    }

}
