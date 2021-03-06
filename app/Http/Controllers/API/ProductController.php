<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Log;
use App\Models\Color;
use App\Models\Size;
use App\Models\SizeProduct;
use App\Models\PriceList;
use App\Models\ColorProduct;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct () {
        set_time_limit(8000000);
        ini_set('max_execution_time', 3000);
        ini_set('max_input_time', 3000);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo phpinfo();
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $products = $request->all();
        // Log::create([
        //     "content" => json_encode($products)
        // ]);
        // return 'ok';

        $errors = array();
        foreach ($products as $product) {
            $validation = Validator::make($product, [
                'product_name' => 'required',
                'product_code' => 'required',
                'measurement' => 'required',
                'price_list' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
            ]);

            $error_array = array();
            if ($validation->fails()) {
                // return $validation->messages()->getMessages();
                foreach ($validation->messages()->getMessages() as $messages) {
                    $errors[] = $messages[0];
                }
                $error_array[$product['product_code']] = $errors;
            }
            else{
                $data = array(
                    'product_name' => $product['product_name'],
                    'deleted_at' => null,
                    'discount_date' => $product['discount_date'],
                    'discount' => $product['discount'],
                    'order_arrival' => $product['order_arrival'],
                    'product_description' => $product['product_description'],
                    'slug' => str_slug($product['product_name'])
                );
                $data_detail = array(
                    'measurement' => $product['measurement']
                );

                $data_price = [];


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

                if (count($product['colors']) > 0) {
                    $colors = $product['colors'];
                    foreach ($colors as $color) {
                        if($color['color_name']){
                            $add = Color::updateOrCreate(['name' => $color['color_name']], ['title' => $color['color_title'] ]);
                            ColorProduct::updateOrcreate([
                                'color_id' => $add->id,
                                'product_id' => $entry->id,
                            ]);
                        }
                    }
                }
                else{
                    Color::updateOrCreate(['id' => 1],['title' => 'none', 'name' => 'none']);
                    ColorProduct::updateOrcreate([
                        'color_id' => 1,
                        'product_id' => $entry->id,
                    ]);
                }


                if (count($product['sizes']) > 0) {
                    $sizes = $product['sizes'];
                    foreach ($sizes as $size) {
                        if($size){
                            $add = Size::updateOrCreate(['name' => $size]);
                            SizeProduct::updateOrcreate([
                                'size_id' => $add->id,
                                'product_id' => $entry->id,
                            ]);
                        }
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
                    $data_price['stock_piece'] = $price['stock_piece'];
                    $price['sale_price'] = $data_price['sale_price'];


                    $data_price['color_id'] = $color_id;
                    $data_price['size_id'] = $size_id;
                    PriceList::updateOrCreate(['product_id' => $entry->id, 'color_id' => $color_id, 'size_id' => $size_id], $data_price);
                }

            }
        }

        if(count($error_array)){
            Log::create([
                "content" => json_encode($error_array)
            ]);
        }

        return response()->json(['status' => 'success', 'errors'=> $error_array]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_code)
    {
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['status' => 'error', 'message' => 'Yanlış sorğu']);
    }
}
