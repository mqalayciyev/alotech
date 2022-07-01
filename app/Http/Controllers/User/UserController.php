<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
// use App\Mail\UserRegistration;
use App\Models\Cart as CartModel;
use App\Models\CartProduct;
use App\Models\PasswordReset;
use App\Models\UserDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index () {
        $user_detail = UserDetail::where('user_id', auth()->id())->first();
        return view('user.pages.user.account', [
            'user_detail' => $user_detail,
        ]);
    }

    public function sign_in_form()
    {
        return view('user.auth.login');
    }


    public function authenticate(Request $request)
    {

        $messages = [
            'email.required'  => 'Email boş ola bilməz.',
            'email.email'  => 'Düzgün email forması daxil edin.',
            'password.required'  => 'Şifrə boş ola bilməz.',
        ];
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);

        $credentials = [
            'email' => request('email'),
            'password' => request('password')
        ];

        $remember = request()->has('remember') ? true : false;

        if (auth()->attempt($credentials, $remember)) {
            request()->session()->regenerate();
            $active_cart_id = CartModel::active_cart_id();
            if (is_null($active_cart_id)) {
                $active_cart = CartModel::create(['user_id' => auth()->id()]);
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

            Cart::destroy();

            $cartProducts = CartProduct::where('cart_id', $active_cart_id)->get();
            foreach ($cartProducts as $cartProduct) {
                $product = Product::find($cartProduct->product_id);
                if($product){
                    Cart::add($cartProduct->product_id,
                                $product->product_name,
                                $cartProduct->piece,
                                $cartProduct->amount,
                                ['slug' => $product->slug,
                                'discount' => $product->discount,
                                'image' => $product->image ? $product->image->main_name : '',
                                'price_id' => $cartProduct->price_id,
                                'size' => $cartProduct->size_id,
                                'color' => $cartProduct->color_id]);

                }
                else{
                    CartProduct::where('cart_id', $active_cart_id)->where('product_id', $cartProduct->product_id)->delete();
                }
            }
            return redirect()->intended('/account')->with(['info' => 'Uğurlu']);
        }


        return back()->with(['error' => 'Təqdim olunan etimadnamələr qeydlərimizə uyğun gəlmir.']);
    }
    public function sign_up_form()
    {
        return view('user.auth.register');
    }
    public function sign_up()
    {
        $messages = [
            'first_name.required' => 'Ad qeyd edilməyib.',
            'first_name.min' => 'Ad minimum 3 simvol olmalıdır.',
            'last_name.required' => 'Soyad qeyd edilməyib.',
            'last_name.min' => 'Soyad minimum 3 simvol olmalıdır.',
            'terms.accepted'  => 'İstifadəçi şərtlərini qəbul etməmisiniz',
            'email.required'  => 'Email boş ola bilməz.',
            'email.email'  => 'Düzgün email forması daxil edin.',
            'email.unique'  => 'Bu email artıq qeydiyyatdan keçib.',
            'email.min' => 'Email minimum 5 simvol olmalıdır.',
            'mobile.required' => 'Nömrə qeyd edilməyib',
            'password.required'  => 'Şifrə boş ola bilməz.',
            'password.min'  => 'Şifrə minimum 8 simvol omalıdır.',
            'password.confirmed'  => 'Şifrələr uyğun deyil.',
        ];

        $this->validate(request(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:user|min:5',
            'mobile' => 'required',
            'terms' => 'accepted',
            'password' => 'required|confirmed|min:8'
        ], $messages);

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'password' => Hash::make(request('password')),
            'is_active' => 1
        ]);

        $credentials = [
            'email' => request('email'),
            'password' => request('password'),
        ];
        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();
            $active_cart_id = CartModel::active_cart_id();
            if (is_null($active_cart_id)) {
                $active_cart = CartModel::create(['user_id' => auth()->id()]);
                $active_cart_id = $active_cart->id;
            }
            session()->put('active_cart_id', $active_cart_id);


            if (Cart::count() > 0) {
                foreach (Cart::content() as $cartItem) {
                    $size = $cartItem->options->size;
                    $color = $cartItem->options->color;
                    CartProduct::updateOrCreate(
                        ['cart_id' => $active_cart_id, 'product_id' => $cartItem->id, 'size_id' => $size, 'color_id' => $color],
                        ['piece' => $cartItem->qty, 'amount' => $cartItem->price, 'price_id' => $cartItem->options->price_id, 'cart_status' => 'Pending']
                    );
                }
            }

            Cart::destroy();
            $cartProducts = CartProduct::where('cart_id', $active_cart_id)->get();
            foreach ($cartProducts as $cartProduct) {
                $product = Product::find($cartProduct->product_id);
                if($product){
                    Cart::add($cartProduct->product_id,
                                $product->product_name,
                                $cartProduct->piece,
                                $cartProduct->amount,
                                ['slug' => $product->slug,
                                'discount' => $product->discount,
                                'price_id' => $cartProduct->price_id,
                                'image' => $product->image->main_name,
                                'size' => $cartProduct->size_id,
                                'color' => $cartProduct->color_id]);

                }
                else{
                    CartProduct::where('cart_id', $active_cart_id)->where('product_id', $cartProduct->product_id)->delete();
                }
            }
            // Mail::to(request('email'))->send(new UserRegistration($user));
            return redirect()->intended('/account')->with(['info' => 'Uğurlu']);
        }
        else {
            return redirect()->back()->with(['warning' => 'Hesabınıza giriş edin']);
        }


        // return redirect()->to('/')
        //         ->with('message', 'Hesab uğurla yaradıldı. Zəhmət olmasa hesabınıza giriş edin.')
        //         ->with('message_type', 'success');
    }
    public function form_info(Request $request){
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ], [
            'first_name.required' => 'Ad daxil edilmeyib.',
            'last_name.required' => 'Soyad daxil edilmeyib.',
            'email.required' => 'Email daxil edilmeyib.',
            'mobile.required' => 'Mobile nomre daxil edilmeyib.',

            ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        User::where('id', auth()->id())->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'mobile' => request('mobile'),
        ]);

        return response()->json(['status' => 'success']);
    }
    public function form_detail(Request $request){
        $validator = Validator::make(request()->all(), [
            'city' => 'required',
            'address' => 'required',
        ], [
            'country.required' => 'Ölkə daxil edilmeyib.',
            'state.required' => 'Paytaxt daxil edilmeyib.',
            'city.required' => 'Şəhər daxil edilmeyib.',
            'address.required' => 'Address daxil edilmeyib.',

            ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }


        UserDetail::updateOrCreate(['user_id' =>  auth()->id()], [
                'phone' => request('phone'),
                'city' => request('city'),
                'zip_code' => request('zip_code'),
                'address' => request('address'),
        ]);
        return response()->json(['status' => 'success']);
    }
    public function form_password(Request $request){


        $user = Auth::user();


        $validator = Validator::make(request()->all(), [
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail("Kohne sifre duzgun daxil edilmeyib.");
                }
            }]
        ], [
            'old_password.required' => 'Kohne sifre qeyd edilmeyib.',
            'password.required' => 'Sifre qeyd edilmeyib.',
            'password_confirmation.required' => 'Sifre(tekrar) qeyd edilmeyib.',
            'password_confirmation.same' => 'Sifreler uygun deyil.',

            ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        User::find(auth()->id())->update([
            'password'=> Hash::make($request->input('password')),
        ]);
        return response()->json(['status' => 'success']);
    }
    public function request_password_form(){
        return view('user.auth.passwords.email');
    }
    public function request_password(){
        $user = User::where('email', '=', request('email'))->first();
        $count =User::where('email', '=', request('email'))->count();
        //Check if the user exists
        if ($count < 1) {
            return redirect()->back()->withErrors(['email' => trans('İstifadəçi mövcud deyil')]);
        }

        //Create Password Reset Token
        $token = str_random(60);
        PasswordReset::insert([
            'email' =>request('email'),
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $reset = ['link' => route('user.reset.password.form', [request('email'), $token])];
        Mail::to(request('email'))->send(new ResetPassword($reset));
        return redirect()->route('user.login')->with('message', trans('Sıfırlama linki elektron poçt ünvanınıza göndərildi.'));
    }
    public function resetPassword($email, $token)
    {


        $count = PasswordReset::where('email', $email)
            ->where('token', $token)
            ->firstOrFail();
        return view('user.auth.passwords.reset', ['email' => $email,'token' => $token]);


    }
    public function change_password(){


        $messages = [
            'email.required'  => 'Email boş ola bilməz.',
            'email.email'  => 'Düzgün email forması daxil edin.',
            'email.min' => 'Email minimum 5 simvol olmalıdır.',
            'password.required'  => 'Şifrə boş ola bilməz.',
            'password.min'  => 'Şifrə minimum 6 simvol omalıdır.',
            'password.confirmed'  => 'Şifrələr uyğun deyil.',
        ];
        $this->validate(request(), [
            'email' => 'required|email|min:5',
            'password' => 'required|confirmed|min:6'
        ], $messages);

        User::where('email', request('email'))->update([
            'password' => Hash::make(request('password')),
        ]);
        PasswordReset::where('email', request('email'))->where('token', request('token'))->delete();
        return redirect()->route('user.login')->with('message', 'Şifrəniz dəyişdirildi.');
    }

    public function logout(){
        Auth::logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('home')->with(['info' => 'Hesabdan çıxdınız.']);
    }
}
