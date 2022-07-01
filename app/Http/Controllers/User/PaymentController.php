<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceSend;
use App\Mail\UserRegistration;
use App\Models\Order;
use App\Models\Info;
use App\Models\User;
use App\Models\City;
use Illuminate\Support\Str;
use App\Models\Cart as CartModel;
use App\Models\CartProduct;
use App\Models\PriceList;
use App\Models\Product;
use App\Traits\Payment;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Library\Azericard;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    use Payment;


    public function index()
    {
        $info = Info::find(1);
        if (!auth()->check()) {
            return redirect()->route('user.sign_in')->with(['info' => __('content.You need to log in or register for a payment.')]);
        } else if (count(Cart::content()) == 0) {
            return redirect()->route('home')->with(['info' => __('content.You must have a product in your cart for payment.')]);
        }



        if (Cart::total() < $info->min_order_amount) {
            return back()->with(['warning', 'Minimum sifariş məbləği ' . $info->min_order_amount . 'AZN-dir']);
        }





        $user_detail = auth()->user()->detail;


        return view('user.pages.payment', compact('user_detail'));
    }

    public function quickPayment()
    {
        $info = Info::find(1);

        if (Cart::total() < $info->min_order_amount) {
            return back()->with(['warning' => 'Minimum sifariş məbləği ' . $info->min_order_amount . 'AZN-dir']);
        }

        return view('user.pages.quick_payment');
    }

    public function city()
    {
        $city = City::find(request('city'));



        $delivery_amount = 0;
        $delivery_days = '';
        $delivery_time = '';
        if($city){
            if (strpos($city->delivery_days, '-')) {
                $days = explode('-', $city->delivery_days);
            } else {
                $days[] = $city->delivery_days;
            }

            $start = $days[0];
            $end = $days[count($days) - 1];

            for ($i = $start; $i <= $end; $i++) {
                $days_array[] = $i;
            }

            $delivery_amount = $city->delivery_amount ? $city->delivery_amount : 0;

            foreach ($days_array as $key => $day) {
                $delivery_days .= '<div class="checkbox delivery_info">
                <input type="radio" id="day-' . $key . '"
                    name="delivery_day"
                    value="' . Carbon::now()->addDays($day)->format('d-m-Y') . '">
                <label
                    for="day-' . $key . '">' .  date('d', strtotime(Carbon::now()->addDays($day))) . ' ' . __('content.month.' . date('F', strtotime(Carbon::now()->addDays($day)))) . '</label>
            </div>';
            }

            foreach ($city->delivery_time as $key => $item) {
                $delivery_time .= '<div class="checkbox delivery_info">
                <input type="radio" name="delivery_time"
                    id="time-' . $key . '"
                    value="' . $item['start'] . '-' . $item['end'] . '">
                <label
                    for="time-' . $key . '">' . $item['start'] . ' - ' . $item['end'] . '</label>
            </div>';
            }
        }

        return response()->json(['delivery_amount' => $delivery_amount, 'delivery_days' => $delivery_days, 'delivery_time' => $delivery_time]);
    }
    public function pay()
    {

        $active_cart_id = session('active_cart_id');


        $cartProduct = CartProduct::where('cart_id', $active_cart_id)->get();
        foreach ($cartProduct as $value) {

            $product = Product::where('id', $value->product_id)->first();
            if ($product) {

                $priceList = PriceList::find($value->price_id);

                if ($priceList->stock_piece == 0) {
                    return redirect()->route('cart')
                        ->with(['warning' => $product->product_name . ' anbarda qalmayıb. Zəhmət olmasa məhsulu səbətdən silin']);
                } elseif ($priceList->stock_piece < $value->piece) {
                    return redirect()->route('cart')
                        ->with(['warning' => $product->product_name . ' maksimum ' . $priceList->stock_piece . ' ' . $product->detail->measurement . ' sifariş edə bilərsiniz. Zəhmət olmasa məhsulun səbət sayını azaldın']);
                }
            }
        }



        $messages = [
            'first_name.required' => 'Ad qeyd edilməyib.',
            'first_name.min' => 'Ad minimum 3 simvol olmalıdır.',
            'last_name.required' => 'Soyad qeyd edilməyib.',
            'last_name.min' => 'Soyad minimum 3 simvol olmalıdır.',
            'email.required'  => 'Email boş ola bilməz.',
            'mobile.required' => 'Nömrə qeyd edilməyib',
            'address.required'  => 'Ünvan boş ola bilməz.',
            'country.required'  => 'Ölkə boş ola bilməz.',
            'city.required'  => 'Şəhər boş ola bilməz.',
            'payment_method.required'  => 'Ödəniş növü seçilməyib.',
        ];
        $this->validate(request(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required',
            'mobile' => 'required|regex:/^\+994{1}[0-9]{9}+$/|not_in:0',
            'address' => 'required',
            'city' => 'required',
            'payment_method' => 'required',
        ], $messages);

        $info = Info::find(1);


        $bonus_amount = 0;
        $bonus = auth()->user()->bonus;
        if (request()->has('with_bonus')) {
            $bonus_amount = request('bonus_amount');
            $bonus = 0;
        }



        $shipping = request('delivery_amount');

        $amount = (Cart::subtotal() + $shipping - $bonus_amount);

        if ($amount < 0) {
            $bonus = abs($amount) / $info->bonus_amount;
            $amount = 0;
        }

        $paymentMethod =  request('payment_method');
        $order = request()->except(['payment_method', '_token']);
        $order['cart_id'] = session('active_cart_id');
        $order['order_amount'] = $amount;
        $order['bonus_amount'] = $bonus_amount;
        $order['bonus_value'] = $info->bonus_amount;
        $order['shipping'] = $shipping;
        $order['delivery_day'] = request('delivery_day');
        $order['delivery_time'] = request('delivery_time');
        $order['status'] = 'Your order has been received';

        // User::find(auth()->id())->update([
        //     'bonus' => $bonus
        // ]);





        foreach (Cart::content() as $item) {
            $product = Product::find($item->id);

            $product->update(['best_selling' => $product->best_selling + 1]);
            // return $product->best_selling;
            if ($product->other_count > 0 && $item->qty >= $product->other_count) {
                $bonus += $product->other_bonus;
                User::where('id', auth()->id())->update([
                    'bonus' => $bonus
                ]);
            } elseif ($product->one_or_more > 0) {
                $bonus += $product->one_or_more;
                User::where('id', auth()->id())->update([
                    'bonus' => $bonus
                ]);
            }
        }

        // dd($order);



//        $payment = $this->getWebPage($order['total_amount'], "https://alotech.az/payment/return");
//        $payment = $this->getPayment($order['total_amount'], route('payment.return', $ordercreated->id));
        $payment = $this->getPayment($order['total_amount'], "https://alotech.az/");

        return view('user.pages.payment_submit', [
            'result' => $payment,
            'order' => $order
        ]);
//        return $payment;
//         dd($payment);



        $ordercreated = Order::create($order);




        Cart::destroy();
        session()->forget('active_cart_id');


        if ($paymentMethod == 1) {
            Order::where('id', $ordercreated->id)->update([
                'bank' => 'Qapıda Ödəmə',
                'order_status' => 'PAYMENT_DOOR',
            ]);

            $cartProduct = CartProduct::where('cart_id', $active_cart_id)->get();
            foreach ($cartProduct as $value) {
                $product = Product::where('id', $value->product_id)->first();
                if ($product) {
                    $priceList = PriceList::find($value->price_id);
                    PriceList::where('id', $value->price_id)->update(['stock_piece' => $priceList->stock_piece - $value->piece]);
                }
            }




            $cart = CartModel::where('id', $active_cart_id)->first();
            $data = [
                'order_amount' => $ordercreated['order_amount'],
                'bonus_amount' => $ordercreated['bonus_amount'],
                'shipping' => $ordercreated['shipping'],
                'payment_type' => 'Qapıda ödəmə',
                'order_status' => 'Sifariş qəbul edildi',
                'card_number' => '',
                'brand' => '',
                'order_date' => date('Y-m-d H:i:s'),
                'payment_date' => date('Y-m-d H:i:s'),
                'client_firstname' => $order['first_name'],
                'client_lastname' => $order['last_name'],
                'client_email' => $order['email'],
                'client_tel' => $order['mobile'],
                'client_address' => $order['address'],
                'discount' => '',
                'cart_products' => $cart->cart_products,
            ];


            Mail::to($order['email'])->send(new InvoiceSend($data));

            return redirect()->route('orders')
                ->with(['message' => 'Sizin sifarişiniz qəbul edildi. Əlavə məlumatlar emailinizə göndərildi.']);
        } elseif ($paymentMethod == 2) {

            Order::where('id', $ordercreated->id)->update([
                'bank' => 'Bank Kartı',
                'order_status' => 'PENDING',
                'status' => 'Payment is expected',
            ]);

            $payment = $this->getPayment($order['total_amount'], "https://alotech.az/",  $ordercreated->id);

            return view('user.pages.payment_submit', [
                'result' => $payment,
                'order' => $order
            ]);
        }
    }
    public function quickPay()
    {

        $active_cart_id = session('active_cart_id');


        $cart = Cart::content();

        foreach ($cart as $cartItem) {

            $product = Product::where('id', $cartItem->id)->first();
            if ($product) {

                $priceList = PriceList::find($cartItem->options->price_id);

                if ($priceList->stock_piece == 0) {
                    return redirect()->route('cart')
                        ->with(['warning' => $product->product_name . ' anbarda qalmayıb. Zəhmət olmasa məhsulu səbətdən silin']);
                } elseif ($priceList->stock_piece < $cartItem->qty) {
                    return redirect()->route('cart')
                        ->with(['warning' => $product->product_name . ' maksimum ' . $priceList->stock_piece . ' ' . $product->detail->measurement . ' sifariş edə bilərsiniz. Zəhmət olmasa məhsulun səbət sayını azaldın']);
                }
            }
        }


        $messages = [
            'first_name.required' => 'Ad qeyd edilməyib.',
            'first_name.min' => 'Ad minimum 3 simvol olmalıdır.',
            'last_name.required' => 'Soyad qeyd edilməyib.',
            'last_name.min' => 'Soyad minimum 3 simvol olmalıdır.',
            'email.required'  => 'Email boş ola bilməz.',
            'mobile.required' => 'Nömrə qeyd edilməyib',
            'address.required'  => 'Ünvan boş ola bilməz.',
            'country.required'  => 'Ölkə boş ola bilməz.',
            'city.required'  => 'Şəhər boş ola bilməz.',
            'payment_method.required'  => 'Ödəniş növü seçilməyib.',
        ];
        $this->validate(request(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required',
            'mobile' => 'required|regex:/^\+994{1}[0-9]{9}+$/|not_in:0',
            'address' => 'required',
            'city' => 'required',
            'payment_method' => 'required',
        ], $messages);


        $user = User::where('email', request('email'))->first();

        if(!$user){
            $random = Str::random(8);
            $user = User::create([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'email' => request('email'),
                'mobile' => request('mobile'),
                'password' => Hash::make($random),
                'is_active' => 1
            ]);

            $user['password'] = $random;
            Mail::to(request('email'))->send(new UserRegistration($user));
        }
        else{
            return redirect()->route('user.login')->with(['warning' => 'Bu emailə uyğun istifadəçi sistemdə mövcuddur zəhmət olmasa giriş edin.']);
        }




        $active_cart_id = CartModel::active_cart_id();
        if (is_null($active_cart_id)) {
            $active_cart = CartModel::create(['user_id' => $user->id]);
            $active_cart_id = $active_cart->id;
        }
        session()->put('active_cart_id', $active_cart_id);

        if (Cart::count() > 0) {
            foreach (Cart::content() as $cartItem) {
                $size = $cartItem->options->size;
                $color = $cartItem->options->color;
                CartProduct::updateOrCreate(
                    ['cart_id' => $active_cart_id, 'product_id' => $cartItem->id, 'size_id' => $size, 'color_id' => $color],
                    ['piece' => $cartItem->qty, 'amount' => $cartItem->price,  'price_id' => $cartItem->options->price_id, 'cart_status' => 'Pending']
                );
            }
        }



        $shipping = request('delivery_amount');

        $amount = (Cart::subtotal() + $shipping);



        $paymentMethod =  request('payment_method');
        $order = request()->except(['payment_method', '_token']);
        $order['cart_id'] = $active_cart_id;
        $order['order_amount'] = $amount;
        $order['shipping'] = $shipping;
        $order['delivery_day'] = request('delivery_day');
        $order['delivery_time'] = request('delivery_time');
        $order['status'] = 'Your order has been received';


        $ordercreated = Order::create($order);


        Cart::destroy();
        session()->forget('active_cart_id');


        if ($paymentMethod == 1) {

            Order::where('id', $ordercreated->id)->update([
                'bank' => 'Qapıda Ödəmə',
                'order_status' => 'PAYMENT_DOOR',
            ]);

            $cartProduct = CartProduct::where('cart_id', $active_cart_id)->get();
            foreach ($cartProduct as $value) {
                $product = Product::where('id', $value->product_id)->first();
                if ($product) {
                    $priceList = PriceList::find($value->price_id);
                    PriceList::where('id', $value->price_id)->update(['stock_piece' => $priceList->stock_piece - $value->piece]);
                }
            }




            $cart = CartModel::where('id', $active_cart_id)->first();
            $data = [
                'order_amount' => $ordercreated['order_amount'],
                'bonus_amount' => $ordercreated['bonus_amount'],
                'shipping' => $ordercreated['shipping'],
                'payment_type' => 'Qapıda ödəmə',
                'order_status' => 'Sifariş qəbul edildi',
                'card_number' => '',
                'brand' => '',
                'order_date' => date('Y-m-d H:i:s'),
                'payment_date' => date('Y-m-d H:i:s'),
                'client_firstname' => $order['first_name'],
                'client_lastname' => $order['last_name'],
                'client_email' => $order['email'],
                'client_tel' => $order['mobile'],
                'client_address' => $order['address'],
                'discount' => '',
                'cart_products' => $cart->cart_products,
            ];


            Mail::to($order['email'])->send(new InvoiceSend($data));

            return redirect()->route('orders')
                ->with(['message' => 'Sizin sifarişiniz qəbul edildi. Əlavə məlumatlar emailinizə göndərildi.']);
        } elseif ($paymentMethod == 2) {
            Order::where('id', $ordercreated->id)->update([
                'bank' => 'Bank Kartı',
                'order_status' => 'PENDING',
                'quickpay' => 1,
                'status' => 'Payment is expected',
            ]);

            $payment = $this->getPayment($order['total_amount'], "https://alotech.az/",  $ordercreated->id);

            return view('user.pages.payment_submit', [
                'result' => $payment,
                'order' => $order
            ]);

        }
    }


    public function complete($id)
    {
        $order = Order::where('id', $id)->first();

        $payment = $this->getPayment($order->order_amount, "https://alotech.az/",  $id);

        return view('user.pages.payment_submit', [
            'result' => $payment,
            'order' => $order
        ]);

    }

    public function paymentPageReturn(Request $request)
    {
        Log::info($request);

        $response = $request->all();

        $order =  Order::where('order_id', trim($response['ORDER'] . "-o"))->first();

        $cart = CartModel::where('id', $order->cart_id)->first();

        $order->tran_date_time = Carbon::now()->format('d-m-Y H:i:s');
        $order->approval_code = isset($response['APPROVAL']) ? $response['APPROVAL'] : null;
        $order->rrn = isset($response['RRN']) ? $response['RRN'] : null;
        $order->save();


        if ($response['ACTION'] == '0' && $response['RC'] == '00') {

            Order::where('id', $order->id)->update([
                'order_status' => 'APPROVED',
                'status' => 'Your order has been received'
            ]);

            $cartProduct = CartProduct::where('cart_id', $order->cart_id)->get();
            foreach ($cartProduct as $value) {
                $product = Product::where('id', $value->product_id)->first();
                if ($product) {
                    $priceList = PriceList::find($value->price_id);
                    PriceList::where('id', $value->price_id)->update(['stock_piece' => $priceList->stock_piece - $value->piece]);
                }
            }


            $data = [
                'order_amount' => $order['order_amount'],
                'bonus_amount' => $order['bonus_amount'],
                'shipping' => $order['shipping'],
                'payment_type' => 'Bank kartı',
                'order_status' => 'ÖDƏNİŞ TAMAMLANIB',
                'card_number' => '',
                'brand' => '',
                'status' => 'Your order has been received',
                'order_date' => Carbon::now()->format('d-m-Y H:i:s'),
                'payment_date' => Carbon::now()->format('d-m-Y H:i:s'),
                'client_firstname' => $order['first_name'],
                'client_lastname' => $order['last_name'],
                'client_email' => $order['email'],
                'client_tel' => $order['mobile'],
                'client_address' => $order['address'],
                'discount' => '',
                'cart_products' => $cart->cart_products,
            ];

            Mail::to($order['email'])->send(new InvoiceSend($data));
        }

        else {

            $data = [
                'order_amount' => $order['order_amount'],
                'bonus_amount' => $order['bonus_amount'],
                'shipping' => $order['shipping'],
                'payment_type' => 'Bank kartı',
                'order_status' => $order->quickpay ? '' : 'ÖDƏNİŞ GÖZLƏNİLİR',
                'card_number' => '',
                'brand' => '',
                'order_date' => Carbon::now()->format('d-m-Y H:i:s'),
                'payment_date' => Carbon::now()->format('d-m-Y H:i:s'),
                'client_firstname' => $order['first_name'],
                'client_lastname' => $order['last_name'],
                'client_email' => $order['email'],
                'client_tel' => $order['mobile'],
                'client_address' => $order['address'],
                'discount' => '',
                'cart_products' => $cart->cart_products,
            ];

            if($order->quickpay){
                $cart = CartModel::where('id', $order->cart_id)->first();
                $user = User::find($cart->user_id);
                $user->forceDelete();
                $cart->forceDelete();
            }

            Mail::to($order['email'])->send(new InvoiceSend($data));
        }
    }
}
