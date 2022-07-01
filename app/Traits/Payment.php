<?php


namespace App\Traits;


use App\Models\Order;
use Illuminate\Support\Facades\Log;
use App\Library\Azericard;

trait Payment
{
    public function getPayment (string $amount, string $redirect, int $id = null){

        $order_id = rand(111111111111, 999999999999);

        $order = Order::where('id', $id)->first();
        $order->order_id = $order_id . "-o";
        $order->save();

        Log::info($order_id);

        $azericard = new Azericard();
        $azericard->setDebug(true);
        $azericard->setTestUrl(env('BANK_BASE_URL_TEST'));
        $azericard->setProdUrl(env('BANK_BASE_URL'));
        $azericard->setAmount($amount);
        $azericard->setTerminal(17201225);
        $azericard->setKeyForSing('70e5f252f7cc6ae4a89d74bfe52c421b');
        $azericard->setEmail("admin@alotech.az");
        $azericard->setMerchantUrl(route('home'));
        $azericard->setDescription("Test yoxlanisi");
        $azericard->setMerchantName("alotech.az");
        $azericard->setReturnUrl($redirect);
        $azericard->setOrder($order_id);
        $result = $azericard->initialize();
        return $result;
    }
}



