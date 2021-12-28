<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Log;
use App\Models\Color;
use App\Models\Size;
use App\Models\SizeProduct;
use App\Models\ColorProduct;
use Illuminate\Support\Facades\Validator;

class XMLController extends Controller
{
    public function index()
    {
        return view('manage.pages.xml.index');
    }
    public function products()
    {
        request()->validate([
            'products' => [
                'bail',
                'required',
                function ($attribute, $value, $fail) {
                    if ($value->getClientMimeType() !== 'text/xml') {
                        $fail('Zəhmət olmasa XML faylı seçin');
                    }
                },
            ]
        ], [
            'bail' => '',
            'required' => 'XML faylı seçilməyib',
        ]);
        $errors = array();
        $file = request('products');
        $filename = request()->file('products')->getClientOriginalName();

        $destinationPath = 'assets/xml/';
        $file->move($destinationPath, $filename);

        $xmlString = file_get_contents(public_path('assets/xml/' . $filename));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);


        $products = $phpArray['products']['product'];

        foreach ($products as $product) {
            $product = $product['@attributes'];
            $validation = Validator::make($product, [
                'product_name' => 'required',
                'product_code' => 'required',
                'measurement' => 'required',
                'stok_piece' => 'required',
                'retail_price' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
            ]);
            

            $error_array = array();
            if ($validation->fails()) {
                // return $validation->messages()->getMessages();
                foreach ($validation->messages()->getMessages() as $messages) {

                    $error_array[] = $messages[0];

                }
                $errors[$product['product_code']] = $error_array;
            }
            else{
                $data = array(
                    'product_name' => $product['product_name'],
                    'deleted_at' => null
                );
                $data_detail = array(
                    'measurement' => $product['measurement']
                );
                $data_price = [];
                if(isset($product['product_description'])){
                    $data['product_description'] = $product['product_description'];
                }
                if(isset($product['discount'])){
                    $data['discount'] = $product['discount'];
                }
                if(isset($product['discount_date'])){
                    $data['discount_date'] = $product['discount_date'];
                }
                
                $data['slug'] = str_slug($product['product_name']);
                // if(isset($product['discount'])){
                //     $data['sale_price'] = $product['retail_price'] - ($product['retail_price']*$product['discount']/100);
                // }
                // else{
                //     // $data['sale_price'] = $product['retail_price'];
                // }



                $category = $product['category_id'];
                $exits_category = Category::where('id', $category)->first();
                if ($exits_category) {
                    $category = array(
                        $exits_category->id
                    );
                }
                $brands = $product['brand_id'];
                $exits_brand = Brand::where('id', $brands)->first();
                if ($exits_brand) {
                    $brands = array(
                        $exits_brand->id
                    );
                }

                $entry = Product::updateOrCreate(
                    [ 'product_code' => $product['product_code']],
                    $data
                );
                $entry->detail()->updateOrCreate($data_detail);
                $entry->categories()->sync($category);
                $entry->brands()->sync($brands);

                if (isset($product['colors'])) {
                    $colors = $product['colors'];
                    foreach ($colors as $color) {
                        $add = Color::updateOrCreate(['name' => $color['color_name']], ['title' => $color['color_title'] ]);
                        ColorProduct::updateOrcreate([
                            'color_id' => $add->id,
                            'product_id' => $entry->id,
                        ]);
                    }
                }
                else{
                    Color::updateOrCreate(['id' => 1],['title' => 'none', 'name' => 'none']);
                    ColorProduct::updateOrcreate([
                        'color_id' => 1,
                        'product_id' => $entry->id,
                    ]);
                }


                if (isset($product['sizes'])) {
                    $sizes = $product['sizes'];
                    foreach ($sizes as $size) {
                        $add = Size::updateOrCreate(['name' => $size], ['name' => $size]);
                        SizeProduct::updateOrcreate([
                            'size_id' => $add->id,
                            'product_id' => $entry->id,
                        ]);
                    }
                }

                foreach ($product['price_list'] as $price) {
                    $color_id = null;
                    $size_id = null;
                    if($price['size_name']){
                        $size_exist = Size::updateOrCreate(['name' => $price['size_name'] ]);
                        SizeProduct::updateOrcreate([
                            'size_id' => $size_exist->id,
                            'product_id' => $entry->id,
                        ]);
                        $size_id = $size_exist->id;
                    }
                    if($price['color_name'] ){
                        $color_exist = Color::updateOrCreate(['name' => $price['color_name'] ], ['title' => $price['color_title'] ]);
                        ColorProduct::updateOrcreate([
                            'color_id' => $color_exist->id,
                            'product_id' => $entry->id,
                        ]);
                        $color_id = $color_exist->id;
                    }
                    else{
                        Color::updateOrCreate(['id' => 1],['title' => 'none', 'name' => 'none']);
                        ColorProduct::updateOrcreate([
                            'color_id' => 1,
                            'product_id' => $entry->id,
                        ]);
                        $color_id = 1;
                    }



                    $data_price['product_id'] = $entry->id;
                    $data_price['sale_price'] = $price['sale_price'];
                    $data_price['wholesale_count'] = $price['wholesale_count'];
                    $data_price['wholesale_price'] = $price['wholesale_price'];
                    if(!$price['sale_price'] ){
                        $data_price['sale_price'] = 0;
                    }


                    $data_price['color_id'] = $color_id;
                    $data_price['size_id'] = $size_id;
                    if(!$price['size_name'] && !$price['color_name']){
                        PriceList::updateOrCreate(['product_id' => $entry->id, 'default_price' => 1],
                            $data_price
                        );
                    }
                    else{
                        PriceList::updateOrCreate(['product_id' => $entry->id, 'default_price' => 0, 'color_id' => $color_id, 'size_id' => $size_id],
                            $data_price
                        );
                    }
                }
                foreach ($product['stock_list'] as $stock) {
                    $color_id = null;
                    $size_id = null;
                    if($stock['size_name']){
                        $size_exist = Size::updateOrCreate(['name' => $stock['size_name'] ]);
                        SizeProduct::updateOrcreate([
                            'size_id' => $size_exist->id,
                            'product_id' => $entry->id,
                        ]);
                        $size_id = $size_exist->id;
                    }
                    if($stock['color_name'] ){
                        $color_exist = Color::updateOrCreate(['name' => $stock['color_name']], ['title' => $stock['color_title'] ] );
                        ColorProduct::updateOrcreate([
                            'color_id' => $color_exist->id,
                            'product_id' => $entry->id,
                        ]);
                        $color_id = $color_exist->id;
                    }
                    else{
                        Color::updateOrCreate(['id' => 1],['title' => 'none', 'name' => 'none']);
                        ColorProduct::updateOrcreate([
                            'color_id' => 1,
                            'product_id' => $entry->id,
                        ]);
                        $color_id = 1;
                    }


                    $data_stock['product_id'] = $entry->id;
                    $data_stock['stock_piece'] = $stock['stock_piece'];
                    if(!$stock['stock_piece'] ){
                        $data_stock['stock_piece'] = 0;
                    }


                    $data_stock['color_id'] = $color_id;
                    $data_stock['size_id'] = $size_id;
                    StockList::updateOrCreate($data_stock);
                }

            }
        }
        if (count($errors)) {
            Log::create([
                "content" => json_encode($errors)
            ]);
            return back()->with(['message_type' => 'danger', 'errors' => $errors]);
        } else {
            return back()->with(['message_type' => 'success', 'message' => "Məhsullar əlavə edildi"]);
        }
    }
    public function brands()
    {
        request()->validate([
            'brands' => [
                'bail',
                'required',
                function ($attribute, $value, $fail) {
                    if ($value->getClientMimeType() !== 'text/xml') {
                        $fail('Zəhmət olmasa XML faylı seçin');
                    }
                },
            ]
        ], [
            'bail' => '',
            'required' => 'XML faylı seçilməyib',
        ]);
        $errors = array();
        $file = request('brands');
        $filename = request()->file('brands')->getClientOriginalName();

        $destinationPath = 'assets/xml/';
        $file->move($destinationPath, $filename);

        $xmlString = file_get_contents(public_path('assets/xml/' . $filename));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);



        $brands = $phpArray['brands']['brand'];
        $errors = array();
        foreach ($brands as $brand) {
            $validation = Validator::make($brand['@attributes'], [
                'brand_id' => 'required',
                'brand_name' => 'required'
            ]);

            if ($validation->fails()) {
                // return $validation->messages()->getMessages();
                foreach ($validation->messages()->getMessages() as $messages) {

                    $error_array[] = $messages[0];
                }
                $errors[$brand['@attributes']['brand_id']] = $error_array;
            } else {
                $data = array(
                    'name' => $brand['@attributes']['brand_name']
                );

                $data['slug'] = str_slug($brand['@attributes']['brand_name']);

                Brand::updateOrCreate(
                    ['id' => $brand['@attributes']['brand_id']],
                    $data
                );
            }
        }

        if (count($errors)) {
            Log::create([
                "content" => json_encode($errors)
            ]);
            return back()->with(['message_type' => 'danger', 'errors_messages' => $errors]);
        } else {
            return back()->with(['message_type' => 'success', 'message' => "Brendlər əlavə edildi"]);
        }
    }
    public function categories()
    {
        request()->validate([
            'categories' => [
                'bail',
                'required',
                function ($attribute, $value, $fail) {
                    if ($value->getClientMimeType() !== 'text/xml') {
                        $fail('Zəhmət olmasa XML faylı seçin');
                    }
                },
            ]
        ], [
            'bail' => '',
            'required' => 'XML faylı seçilməyib',
        ]);
        $errors = array();
        $file = request('categories');
        $filename = request()->file('categories')->getClientOriginalName();

        $destinationPath = 'assets/xml/';
        $file->move($destinationPath, $filename);

        $xmlString = file_get_contents(public_path('assets/xml/' . $filename));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);


        $categories = $phpArray['categories']['category'];

        foreach ($categories as $category) {
            $validation = Validator::make($category['@attributes'], [
                'category_id' => 'required',
                'category_name' => 'required'
            ]);

            $error_array = array();
            if ($validation->fails()) {
                // return $validation->messages()->getMessages();
                foreach ($validation->messages()->getMessages() as $messages) {

                    $error_array[] = $messages[0];
                }
                $errors[$category['@attributes']['category_id']] = $error_array;
            } else {
                $data = array(
                    'category_name' => $category['@attributes']['category_name']
                );

                if (isset($category['@attributes']['top_id'])) {
                    $data['top_id'] = $category['@attributes']['top_id'];
                }


                $data['slug'] = str_slug($category['@attributes']['category_name']);

                Category::updateOrCreate(
                    ['id' => $category['@attributes']['category_id']],
                    $data
                );
            }
        }

        if (count($errors)) {
            Log::create([
                "content" => json_encode($errors)
            ]);
            return back()->with(['message_type' => 'danger', 'errors' => $errors]);
        } else {
            return back()->with(['message_type' => 'success', 'message' => "Kategoriyalar əlavə edildi"]);
        }
    }
}
