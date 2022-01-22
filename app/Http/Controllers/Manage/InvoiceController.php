<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Info;
use App\Models\Cart;
use App\Mail\InvoiceSend;
use App\Mail\OrderStatus;
use Illuminate\Support\Facades\Mail;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function  index(){
        $order = Order::with('cart.cart_products.product')->find(request('id'));
        $user = User::where('id', $order->cart->user_id)->first();
        $info = Info::find(1);
        
        $cart = Cart::where('id', $order->cart_id)->first();
        
        
        
        $client = new Party([
            'name'          => config('app.name'),
            'phone'         => $info->mobile,
            'custom_fields' => [
                'email'        => $info->email,
                'address' => $info->address,
            ],
        ]);

        $customer = new Party([
            'name'          => $order->first_name . ' ' . $order->last_name,
            'address'       => $order->address,
            'custom_fields' => [
                'mobil' => $order->mobile,
                'email' => $order->email,
                // 'poçt kodu' => $order->zip_code,
                'Şəhər' => $order->city,
                // 'Ölkə' => $order->country,
                'sifariş nömrəsi' => 'SP-' . request('id'),
                'sifariş tarixi' => $order->created_at,
                'Ödəniş növü' => $order->bank,
                'Ödəniş tarixi' => $order->tran_date_time,
            ],
        ]);
        $items = [];
        foreach ($order->cart->cart_products as $key => $item) {
            $unit = $item->size ? 'Ölçü: ' . $item->size->name  : null;
            $unit .= $item->color_id > 1 ? ', Rəng: ' . $item->color->title  : null;
            $items[] = (new InvoiceItem())->title($item->product->product_name)->pricePerUnit($item->amount)->quantity($item->piece)->units($unit);
        }
        
        
        $amount = number_format( $order->order_amount - $order->shipping + $order->bonus_amount, 2);
        $notes = [$amount, $order->bonus_amount, $order->shipping, $order->order_amount];
        
        $invoice = Invoice::make('INVOICE')
            ->series('SP')
            ->sequence(request('id'))
            ->serialNumberFormat('{SERIES}{SEQUENCE}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('₼')
            ->currencyCode('AZN')
            ->currencyFormat('{VALUE}{SYMBOL}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes(json_encode($notes))
            ->logo('true')
            ->save('public');



        
        return $invoice->stream();
    }
    public function customer (){
        $order = Order::with('cart.cart_products.product')->find(request('id'));
        $user = User::where('id', $order->cart->user_id)->first();
        $info = Info::find(1);

        $client = new Party([
            'name'          => config('app.name'),
            'phone'         => $info->mobile,
            'custom_fields' => [
                'email'        => $info->email,
                'address' => $info->address,
            ],
        ]);

        $customer = new Party([
            'name'          => $order->first_name . ' ' . $order->last_name,
            'address'       => $order->address,
            'custom_fields' => [
                'mobil' => $order->mobile,
                'email' => $order->email,
                // 'poçt kodu' => $order->zip_code,
                'Şəhər' => $order->city,
                // 'Ölkə' => $order->country,
                'sifariş nömrəsi' => 'SP-' . request('id'),
                'sifariş tarixi' => $order->created_at,
                'Ödəniş növü' => $order->bank,
                'Ödəniş tarixi' => $order->tran_date_time,
            ],
        ]);
        $items = [];
        foreach ($order->cart->cart_products as $key => $item) {
            $unit = $item->size ? 'Ölçü: ' . $item->size->name  : '';
            $unit .= $item->color ? ', Rəng: ' . $item->color->title  : '';
            $items[] = (new InvoiceItem())->title($item->product->product_name)->pricePerUnit($item->amount)->quantity($item->piece)->units($unit);
        }

        $amount = number_format( $order->order_amount - $order->shipping + $order->bonus_amount, 2);
        $notes = [$amount, $order->bonus_amount, $order->shipping, $order->order_amount];
        
        $invoice = Invoice::make('INVOICE')
            ->series('SP')
            ->sequence(request('id'))
            ->serialNumberFormat('{SERIES}{SEQUENCE}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('₼')
            ->currencyCode('AZN')
            ->currencyFormat('{VALUE}{SYMBOL}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes(json_encode($notes))
            ->save('public');



        // $base64File = "data:application/pdf;base64," . base64_encode($invoice->stream());
        // $filename = "invoice.pdf";

            
        

        // $data = json_encode(array(
        //     'phone' => $order->mobile,
        //     'body' => $base64File,
        //     'filename' => $filename,
        //     'caption'=>'SP-' . $order->id
        // ));
        
        // $token = '6pb2shvqdz5zpcqq';
        // $instanceId = '381151';
        
        
        // $url = 'https://eu138.chat-api.com/instance'.$instanceId.'/sendFile?token='.$token;
        // // Make a POST request
        // $options = stream_context_create(['http' => [
        //         'method'  => 'POST',
        //         'header'  => 'Content-type: application/json',
        //         'content' => $data
        //     ]
        // ]);
        
        
        // $result = file_get_contents($url, false, $options);
        return response()->json(['status' => 'success']);
    }
    public function warehouse (){
        $validation = Validator::make(request()->all(), [
            'number' => 'regex:/^\+?[0-9]{9,12}+$/|not_in:0',
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Düzgün nömrə formaatı qeyd edin. Nümunə: +994512221423']);
        }
        
        $order = Order::with('cart.cart_products.product')->find(request('id'));
        $user = User::where('id', $order->cart->user_id)->first();
        $info = Info::find(1);

        $client = new Party([
            'name'          => config('app.name'),
            'phone'         => $info->mobile,
            'custom_fields' => [
                'email'        => $info->email,
                'address' => $info->address,
            ],
        ]);

        $customer = new Party([
            'name'          => $order->first_name . ' ' . $order->last_name,
            'address'       => $order->address,
            'custom_fields' => [
                'mobil' => $order->mobile,
                'email' => $order->email,
                // 'poçt kodu' => $order->zip_code,
                'Şəhər' => $order->city,
                // 'Ölkə' => $order->country,
                'sifariş nömrəsi' => 'SP-' . request('id'),
                'sifariş tarixi' => $order->created_at,
                'Ödəniş növü' => $order->bank,
                'Ödəniş tarixi' => $order->tran_date_time,
            ],
        ]);
        $items = [];
        foreach ($order->cart->cart_products as $key => $item) {
            $unit = $item->size ? 'Ölçü: ' . $item->size->name  : '';
            $unit .= $item->color ? ', Rəng: ' . $item->color->title  : '';
            $items[] = (new InvoiceItem())->title($item->product->product_name)->pricePerUnit($item->amount)->quantity($item->piece)->units($unit);
        }

        $amount = number_format( $order->order_amount - $order->shipping + $order->bonus_amount, 2);
        $notes = [$amount, $order->bonus_amount, $order->shipping, $order->order_amount];
        
        $invoice = Invoice::make('INVOICE')
            ->series('SP')
            ->sequence(request('id'))
            ->serialNumberFormat('{SERIES}{SEQUENCE}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('₼')
            ->currencyCode('AZN')
            ->currencyFormat('{VALUE}{SYMBOL}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes(json_encode($notes))
            ->logo('true')
            ->save('public');



        // $base64File = "data:application/pdf;base64," . base64_encode($invoice->stream());
        // $filename = "invoice.pdf";

            
        

        // $data = json_encode(array(
        //     'phone' => request('number'),
        //     'body' => $base64File,
        //     'filename' => $filename,
        //     'caption'=>'SP-' . $order->id
        // ));
        
        // $token = '6pb2shvqdz5zpcqq';
        // $instanceId = '381151';
        
        
        // $url = 'https://eu138.chat-api.com/instance'.$instanceId.'/sendFile?token='.$token;
        // // Make a POST request
        // $options = stream_context_create(['http' => [
        //         'method'  => 'POST',
        //         'header'  => 'Content-type: application/json',
        //         'content' => $data
        //     ]
        // ]);
        
        
        // $result = file_get_contents($url, false, $options);
        return response()->json(['status' => 'success']);
    }
    public function courier (){
        $validation = Validator::make(request()->all(), [
            'number' => 'regex:/^\+?[0-9]{9,12}+$/|not_in:0',
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Düzgün nömrə formaatı qeyd edin. Nümunə: +994512221423']);
        }

        $order = Order::with('cart.cart_products.product')->find(request('id'));

        // $message = 'Müştəri: ' . $order->first_name . ' ' . $order->last_name . "\r\n" .
        //     'Mobil: ' . $order->mobile . "\r\n" .
        //     'Telefon: ' . $order->phone . "\r\n" .
        //     'Ünvan: ' .  $order->address . "\r\n" .
        //     'Sifariş nömrəsi: SP-' .  $order->id . "\r\n" .
        //     'Ödəniş növü: ' .  $order->bank;
        // $data = [
        //     'phone' => request('number'), // Receivers phone
        //     'body' => $message, // Message
        // ];
        // $json = json_encode($data); // Encode data to JSON
        // // URL for request POST /message
        // $token = '6pb2shvqdz5zpcqq';
        // $instanceId = '381151';
        // $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
        // // Make a POST request
        // $options = stream_context_create(['http' => [
        //         'method'  => 'POST',
        //         'header'  => 'Content-type: application/json',
        //         'content' => $json
        //     ]
        // ]);
        
        // $result = file_get_contents($url, false, $options);
        return response()->json(['status' => 'success']);
    }
}
