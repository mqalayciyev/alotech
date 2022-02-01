<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart as CartModel;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ColorProduct;
use App\Models\SizeProduct;
use App\Models\PriceList;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\ProductCompany;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Event;
use App\Events\ControlCompany;

class CartController extends Controller
{

    // public function __construct()
    // {
    //     Event::dispatch(new ControlCompany());
    // }

    public function index()
    {
        // Cart::destroy();

        return view('user.pages.cart');
    }

    public function my_cart()
    {

        if (count(Cart::content()) > 0) {
            $output = '';
            $quickPay = auth()->check() ? null : '<div class="d-md-flex"><a href="'. route('quickPayment') . '" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Qeydiyyatsız Sifariş Ver</a></div>';
            foreach (Cart::content() as $productCartItem) {

                $color = '';
                if($productCartItem->options->color > 1){
                    $colors = Color::where('id', $productCartItem->options->color)->firstOrFail();
                    $color = $colors->title;
                }
                $size = '';
                if($productCartItem->options->size > 0){
                    $sizes = Size::where('id', $productCartItem->options->size)->firstOrFail();
                    $size = $sizes->name ;
                }

                $img = $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png');
                $output .= '<tr>
                <td data-label="Sil" class="text-center">
                    <a href="javascript:void(0)" id="' . $productCartItem->rowId . '" class="delete Remove text-gray-32 font-size-26"><i class="icon-cross"></i></a>
                </td>
            <td class="d-md-table-cell">
                <a href="' . route('product', $productCartItem->options->slug) . '"><img class="img-fluid max-width-100 p-1 border border-color-1" src="' . $img . '" alt="Image Description"></a>
            </td>
            <td data-title="Məhsul">
                <a class="text-gray-90" href=' . route('product', $productCartItem->options->slug) . '>' . $productCartItem->name . ' ' . $size . ' ' . $color . '</a>
            </td>
            <td class="price" data-label="Qiymət"><span class="currency_azn">' . $productCartItem->price . '</span></td>

            <td data-title="Miqdarı">
                <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                    <div class="js-quantity row align-items-center ProductQuantity">
                        <div class="col">
                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none ProductQuantity-Input form-control input-' . $productCartItem->rowId . '"
                                type="text"
                                min="1"
                                name="piece"
                                value="' . $productCartItem->qty . '"
                                data-id="' . $productCartItem->rowId . '"
                                data-product="'. $productCartItem->id .'"
                                data-sale-price="'. $productCartItem->price .'"
                                step="1"
                                autocomplete="off"
                            >
                        </div>
                        <div class="col-auto pr-1">
                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 cartProductQuantityMinus" data-id="' . $productCartItem->rowId . '" href="javascript:void(0);">
                                <small class="fas fa-minus btn-icon__inner"></small>
                            </a>
                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 cartProductQuantityPlus" data-id="' . $productCartItem->rowId . '" href="javascript:void(0);">
                                <small class="fas fa-plus btn-icon__inner"></small>
                            </a>
                        </div>
                    </div>
                </div>
            </td>
            <td data-title="Ümumi"><span class="currency_azn">' . $productCartItem->price * $productCartItem->qty . '</span></td>
            </tr>';
            }
            $output .= '<tr>
            <td colspan="6" class="border-top space-top-2 justify-content-center">
                <div class="pt-md-3">
                    <div class="d-block d-md-flex flex-center-between">
                        <div class="d-md-flex">
                            <a href="'. route('payment') . '" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Sifariş Ver</a>
                        </div>
                        ' . $quickPay . '
                    </div>
                </div>
            </td>
        </tr>';
        } else {
            $output = '<tr><td colspan="7" class="text-center">Səbətdə məhsul yoxdur</td></tr>';
        }

        return response()->json(['output' => $output, 'total' => Cart::total(), 'count' => Cart::count() ]);
    }

    public function update_cart()
    {

        $piece = request()->get('piece');

        // $product = request()->get('product');

        $rowID = request()->get('rowID');
        $product = Product::find(request()->get('product'));
        $sale_price = request()->get('sale_price');




        $cart = Cart::get($rowID);


        $priceList = PriceList::find($cart->options->price_id);
        $wholesale_count = $priceList->wholesale_count;
        $wholesale_price = $priceList->wholesale_price;


        if($piece > $priceList->stock_piece){
            $piece = $priceList->stock_piece;
        }

        if($wholesale_count > 0 && $piece >= $wholesale_count){
            $sale_price = $wholesale_price;
        }
        else{
            $sale_price = $priceList->sale_price - ($priceList->sale_price*$product->discount / 100);
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

        $output = '';
        if (count(Cart::content()) > 0) {
            $output .= '';
            foreach (Cart::content() as $productCartItem) {

                $color = '';
                if($productCartItem->options->color > 1){
                    $colors = Color::where('id', $productCartItem->options->color)->firstOrFail();
                    $color = $colors->title;
                }
                $size = '';
                if($productCartItem->options->size > 0){
                    $sizes = Size::where('id', $productCartItem->options->size)->firstOrFail();
                    $size = $sizes->name ;
                }
                // $stok_piece = Product::select('stok_piece')->where('id', $productCartItem->id)->first();
                $img = $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png');
                $output .= '<tr>
                <td data-label="Sil" class="text-center">
                    <a href="javascript:void(0)" id="' . $productCartItem->rowId . '" class="delete Remove text-gray-32 font-size-26"><i class="icon-cross"></i></a>
                </td>
            <td class="d-none d-md-table-cell">
                <a href="' . route('product', $productCartItem->options->slug) . '"><img class="img-fluid max-width-100 p-1 border border-color-1" src="' . $img . '" alt="Image Description"></a>
            </td>
            <td data-title="Məhsul">
                <a class="text-gray-90" href=' . route('product', $productCartItem->options->slug) . '>' . $productCartItem->name . ' ' . $size . ' ' . $color . '</a>
            </td>
            <td class="price" data-label="Qiymət"><span class="currency_azn">' . $productCartItem->price . '</span></td>

            <td data-titl="Miqdarı">
                <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                    <div class="js-quantity row align-items-center ProductQuantity">
                        <div class="col">
                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none ProductQuantity-Input form-control input-' . $productCartItem->rowId . '"
                                type="text"
                                min="1"
                                name="piece"
                                value="' . $productCartItem->qty . '"
                                data-id="' . $productCartItem->rowId . '"
                                data-product="'. $productCartItem->id .'"
                                data-sale-price="'. $productCartItem->price .'"
                                step="1"
                                autocomplete="off"
                            >
                        </div>
                        <div class="col-auto pr-1">
                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 cartProductQuantityMinus" data-id="' . $productCartItem->rowId . '" href="javascript:void(0);">
                                <small class="fas fa-minus btn-icon__inner"></small>
                            </a>
                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 cartProductQuantityPlus" data-id="' . $productCartItem->rowId . '" href="javascript:void(0);">
                                <small class="fas fa-plus btn-icon__inner"></small>
                            </a>
                        </div>
                    </div>
                </div>
            </td>
            <td data-title="Ümumi"><span class="currency_azn">' . $productCartItem->price * $productCartItem->qty . '</span></td>

        </tr>';
            }
            $output .= '<tr>
            <td colspan="6" class="border-top space-top-2 justify-content-center">
                <div class="pt-md-3">
                    <div class="d-block d-md-flex flex-center-between">
                        <div class="d-md-flex">
                            <a href="'. route('payment') . '" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Sifariş Ver</a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>';
        } else {
            $output .= '<tr><td colspan="7" class="text-center">Səbətdə məhsul yoxdur</td></tr>';
        }

        Event::dispatch(new ControlCompany());
        return response()->json(['output' => $output, 'total' => Cart::total(), 'count' => Cart::count(), 'discount' => session()->get('discount')]);
    }

    public function add_to_cart()
    {


        $validator = Validator::make(request()->all(), [
            'piece' => 'required',
            'amount' => 'required',
            'id' => 'required',
            'priceId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => ["Bu məhsul anbarda qalmayıb"]]);
        }


        $piece = request()->get('piece');

        if($piece < 1){
            $piece = 1;
        }
        $priceId = request()->get('priceId');
        $amount = request()->get('amount');
        $size = request()->get('size');
        $color = request()->get('color');

        if(!$color){
            $color = 1;
        }

        $product = Product::find(request()->get('id'));

        $priceList = PriceList::find($priceId);

        if($priceList->stock_piece < 1){
            return response()->json(['status' => 'error', 'message' => ['Bu məhsul anbarda qalmayıb']]);
        }
        else{
            if($piece > $priceList->stock_piece){
                return response()->json(['status' => 'error', 'message' => ['Seçilən say anbar sayından çoxdur']]);
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
            if($qty + $piece > $priceList->stock_piece){
                return response()->json(['status' => 'error', 'message' => ['Seçilən say anbar sayından çoxdur']]);
            }
        }

        $price = $amount;
        $discount = $product->discount;
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
        $image = ProductImage::where('product_id', $product->id)->where('color_id', $color)->orWhere('color_id', null)->first()->image_name;
        // Cart::destroy();


        if(request('company')){
            $company = ProductCompany::where('product_id', $product->id)->with(['product', 'product.images', 'price'])->get();
            foreach ($company as $item) {

                $imgC = ProductImage::where('product_id', $item->product->id)->where('color_id', $item->price->color_id)->orWhere('color_id', null)->first()->image_name;

                $priceC = $item->price->sale_price;

                if($item->product->discount){
                    $priceC = $priceC * ((100 - $item->product->discount) / 100);
                }
                $cartItemC = Cart::add($item->product->id, $item->product->product_name, 1, $priceC, ['slug' => $item->product->slug, 'price_id' => $item->price->id, 'discount' => $item->product->discount, 'image' => $imgC, 'color'=> $item->price->color_id, 'size' => $item->price->size_id]);

                if (auth()->check()) {
                    $active_cart_id = session('active_cart_id');

                    if (!isset($active_cart_id)) {
                        $active_cart = CartModel::create([
                            'user_id' => auth()->id()
                        ]);
                        $active_cart_id = $active_cart->id;
                        session()->put('active_cart_id', $active_cart_id);
                    }

                    CartProduct::updateOrCreate(
                        ['cart_id' => $active_cart_id, 'product_id' => $item->product->id, 'size_id' => $item->price->size_id, 'color_id' => $item->price->color_id,],
                        ['piece' => $cartItemC->qty, 'amount' => $cartItemC->price, 'price_id' => $item->price->id, 'cart_status' => 'Pending']
                    );
                }
            }
            $discountAmount = $company->first()->discount;
            // if(session()->get('discount')){
            //     $discountAmount += session()->get('discount');
            // }

            // session()->put('discount', $discountAmount);

        }
        // return $coupon;

        if($rowId){
           $cartItem = Cart::update($rowId, ['qty' => $qty, 'price' => $price]);
        }
        else{
            $cartItem = Cart::add($product->id, $product->product_name, $piece, $price, ['slug' => $product->slug, 'price_id' => $priceId, 'discount' => $discount, 'image' => $image, 'color'=> $color, 'size' => $size]);
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

            CartProduct::updateOrCreate(
                ['cart_id' => $active_cart_id, 'product_id' => $product->id, 'size_id' => $size, 'color_id' => $color],
                ['piece' => $cartItem->qty, 'amount' => $cartItem->price, 'price_id' => $priceId, 'cart_status' => 'Pending']
            );

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
        Event::dispatch(new ControlCompany());
        return response()->json(['status'  => 'success', 'message' => 'Məhsul səbətə əlavə edildi', 'output' => $output, 'total' => Cart::total(), 'count' => Cart::count() ]);

    }

    public function delete()
    {
        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            $cartItem = Cart::get(request()->get('rowID'));
            CartProduct::where('cart_id', $active_cart_id)->where('product_id', $cartItem->id)->delete();
        }
        Cart::remove(request()->get('rowID'));


        $output = '';
        if (count(Cart::content()) > 0) {
            $output .= '';
            foreach (Cart::content() as $productCartItem) {

                $color = '';
                if($productCartItem->options->color > 1){
                    $colors = Color::where('id', $productCartItem->options->color)->firstOrFail();
                    $color = $colors->title;
                }
                $size = '';
                if($productCartItem->options->size > 0){
                    $sizes = Size::where('id', $productCartItem->options->size)->firstOrFail();
                    $size = $sizes->name ;
                }
                // $stok_piece = Product::select('stok_piece')->where('id', $productCartItem->id)->first();
                $img = $productCartItem->options->image ? asset('assets/img/products/' . $productCartItem->options->image) : asset('assets/img/logo.png');
                $output .= '<tr>
                <td data-label="Sil" class="text-center">
                    <a href="javascript:void(0)" id="' . $productCartItem->rowId . '" class="delete Remove text-gray-32 font-size-26"><i class="icon-cross"></i></a>
                </td>
            <td class="d-none d-md-table-cell">
                <a href="' . route('product', $productCartItem->options->slug) . '"><img class="img-fluid max-width-100 p-1 border border-color-1" src="' . $img . '" alt="Image Description"></a>
            </td>
            <td data-title="Məhsul">
                <a class="text-gray-90" href=' . route('product', $productCartItem->options->slug) . '>' . $productCartItem->name . ' ' . $size . ' ' . $color . '</a>
            </td>
            <td class="price" data-label="Qiymət"><span class="currency_azn">' . $productCartItem->price . '</span></td>

            <td data-titl="Miqdarı">
                <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                    <div class="js-quantity row align-items-center ProductQuantity">
                        <div class="col">
                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none ProductQuantity-Input form-control input-' . $productCartItem->rowId . '"
                                type="text"
                                min="1"
                                name="piece"
                                value="' . $productCartItem->qty . '"
                                data-id="' . $productCartItem->rowId . '"
                                data-product="'. $productCartItem->id .'"
                                data-sale-price="'. $productCartItem->price .'"
                                step="1"
                                autocomplete="off"
                            >
                        </div>
                        <div class="col-auto pr-1">
                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 cartProductQuantityMinus" data-id="' . $productCartItem->rowId . '" href="javascript:void(0);">
                                <small class="fas fa-minus btn-icon__inner"></small>
                            </a>
                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 cartProductQuantityPlus" data-id="' . $productCartItem->rowId . '" href="javascript:void(0);">
                                <small class="fas fa-plus btn-icon__inner"></small>
                            </a>
                        </div>
                    </div>
                </div>
            </td>
            <td data-title="Ümumi"><span class="currency_azn">' . $productCartItem->price * $productCartItem->qty . '</span></td>

        </tr>';
            }
            $output .= '<tr>
            <td colspan="6" class="border-top space-top-2 justify-content-center">
                <div class="pt-md-3">
                    <div class="d-block d-md-flex flex-center-between">
                        <div class="d-md-flex">
                            <a href="'. route('payment') . '" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Sifariş Ver</a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>';
        } else {
            $output .= '<tr><td colspan="7" class="text-center">Səbətdə məhsul yoxdur</td></tr>';
        }
        Event::dispatch(new ControlCompany());
        return response()->json(['output' => $output, 'total' => Cart::total(), 'count' => Cart::count(), 'discount' => session()->get('discount') ]);
    }

    public function destroy()
    {
        if (auth()->check()) {
            $active_cart_id = session('active_cart_id');
            CartProduct::where('cart_id', $active_cart_id)->delete();
        }
        Cart::destroy();
    }

}
