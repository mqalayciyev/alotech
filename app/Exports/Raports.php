<?php

namespace App\Exports;

use App\Models\CartProduct;
use App\Models\Cart;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
// class Raports implements FromQuery, WithHeadings

class Raports implements FromCollection, WithHeadings
{
    use Exportable;

    public function __construct($dates = null)
    {
        $this->type = $dates['type'];
    }

    public function query()
    {
        if ($this->type == "products"){
            return CartProduct::select([
                "cart_product.cart_id",
                "product.product_name",
                 "size.name",
                "color.title",
                "cart_product.piece",
                "cart_product.amount"
            ])->leftJoin('product', 'product.id', 'cart_product.product_id')->get();
        } 
        else if ($this->type == "orders") {
            $orders = Order::select([
             "order.id",
                "order.cart_id",
                "order.order_amount",
                "order.status",
                "order.first_name",
                "order.last_name",
                "order.email",
                "order.address",
                "order.phone",
                "order.mobile",
                "order.city",
                "order.bank",
                "order.tran_date_time",
                "order.order_status",
                "order.brand",
                "order.installment_number",
                "order.created_at",
            DB::raw('CONCAT(GROUP_CONCAT(DISTINCT JSON_OBJECT("Adı" , product.product_name, "Rəng", color.title  , "Ölçü", size.name, "Miqdar", cart_product.piece, "Qiymət",cart_product.amount))) AS order_items')])
            ->leftJoin('cart_product', 'cart_product.cart_id', 'order.cart_id')
            ->leftJoin('product', 'product.id', 'cart_product.product_id')
            ->leftJoin('color', 'color.id', 'cart_product.color_id')
            ->leftJoin('size', 'size.id', 'cart_product.size_id')
            ->groupBy('order.id')->get();
            
            return $orders;
        }
    }

    public function collection()
    {
        if ($this->type == "products") {
            return CartProduct::select([
                "cart_product.cart_id",
                "product.product_name",
                "size.name",
                "color.title",
                "cart_product.piece",
                "cart_product.amount"
            ])->leftJoin('product', 'product.id', 'cart_product.product_id')->leftJoin('color', 'color.id', 'cart_product.color_id')->leftJoin('size', 'size.id', 'cart_product.size_id')->get();
        } else if ($this->type == "orders") {
            $orders = Order::select([
             "order.id",
                "order.cart_id",
                "order.order_amount",
                "order.status",
                "order.first_name",
                "order.last_name",
                "order.email",
                "order.address",
                "order.phone",
                "order.mobile",
                "order.city",
                "order.bank",
                "order.tran_date_time",
                "order.order_status",
                "order.brand",
                "order.installment_number",
                "order.created_at",
            DB::raw('CONCAT(GROUP_CONCAT(DISTINCT JSON_OBJECT("Adı" , product.product_name, "Rəng", color.title  , "Ölçü", size.name, "Miqdar", cart_product.piece, "Qiymət",cart_product.amount))) AS order_items')])
            ->leftJoin('cart_product', 'cart_product.cart_id', 'order.cart_id')
            ->leftJoin('product', 'product.id', 'cart_product.product_id')
            ->leftJoin('color', 'color.id', 'cart_product.color_id')
            ->leftJoin('size', 'size.id', 'cart_product.size_id')
            ->groupBy('order.id')->get();
            
            return $orders;
        }
    }

    public function headings(): array
    {
        if ($this->type == "products") {
            return [
                "Səbət İd",
                "Məhsul adı",
                "Ölçü",
                "Rəng",
                "Miqdar",
                "Qiymət"
            ];
        } else if ($this->type == "orders") {
            return [
                "Sifariş İd",
                "Səbət İd",
                "Sifariş Məbləği",
                "Status",
                "Ad",
                "Soyad",
                "Email",
                "Ünvan",
                "Telefon",
                "Mobil",
                "Şəhər",
                "Ödəniş forması",
                "Ödənişin tarixi",
                "Sifarişin statusu",
                "Brend",
                "Taksit",
                "Sifariş tarixi",
                "Məhsullar"
            ];
        }
    }
}
