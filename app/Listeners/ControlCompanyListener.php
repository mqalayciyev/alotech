<?php

namespace App\Listeners;

use App\Events\ControlCompany;
use App\Models\ProductCompany;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ControlCompanyListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ControlCompany  $event
     * @return void
     */
    public function handle(ControlCompany $event)
    {
        // if(session()->get('discount')){
        //     echo "<pre>";
        //     print_r(session()->get('discount'));
        //     echo "</pre>";
        // }
        // else{
        //     echo 'session none';
        // }
        // session()->put('discount', rand());
        // session()->save();
        $company = collect(ProductCompany::all())->unique('product_id');
        $array = [];
        foreach ($company as $item) {
            $array[] = $item->product_id;
        }
        $cart = Cart::content()->toArray();
        $discount = 0;
        foreach (Cart::content() as $content) {
            if(in_array($content->id, $array)){
                $count[] = $content->qty;
                $companyProducts = ProductCompany::where('product_id', $content->id)->get();
                $null = 0;
                foreach ($companyProducts as $value) {
                    // $value->company_id;
                    $id = $value->company_id;
                    $result = array_filter($cart, function($var) use ($id) {
                        return $var['id'] == $id;
                    });
                    if(count($result) == 0){
                        $null = 1;
                    }
                    else{
                        $rows=null;
                        foreach ($result as $rows) break;
                        $count[] = $rows['qty'];
                    }
                }

                if($null == 0){
                    $discount += $companyProducts->first()->discount * min($count);
                    // $session = session()->put('get');
                    session()->put('discount', $companyProducts->first()->discount * min($count));
                    session()->save();
                }
                else{
                    $discount += 0;
                    // session()->forget('discount');
                    // session()->save();
                }
                // $session = session()->get('discount') ? session()->get('discount') : 0;
            }
        }

        
        if(session()->get('discount') != $discount){
            session()->put('discount', $discount);
            session()->save();
        }
        else{
            session()->put('discount', $discount);
        }
       
    }
}
