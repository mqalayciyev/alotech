<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
use App\Models\Slider;
use App\Traits\ADNS;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Size;
use App\Models\SizeProduct;
use App\Models\PriceList;
use App\Models\ColorProduct;

class CommonController extends Controller
{
    use ADNS;

    public function ckEditorProductUpload()
    {
        try {
            $task = new Product();
            $task->id = 0;
            $task->exists = true;
            $image = $task->addMediaFromRequest('upload')->toMediaCollection('images');

            return response([
                "url" => $image->getUrl('thumb')
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function ckEditorSliderUpload()
    {
        try {
            $task = new Slider();
            $task->id = 0;
            $task->exists = true;
            $image = $task->addMediaFromRequest('upload')->toMediaCollection('images');

            return response([
                "url" => $image->getUrl('thumb')
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getCatgeory()
    {
        $categories = $this->getCategories();


        $success = 0;
        $error = 0;


        foreach ($categories as $category) {

            if (trim($category->{'category_name'}) &&  preg_replace("/[^0-9]/", '', ltrim(trim($category->{'category_id'}), 0))) {
                Category::updateOrCreate(
                    ['id' => preg_replace("/[^0-9]/", '', ltrim(trim($category->{'category_id'}), 0))],
                    [
                        'category_name' => trim($category->{'category_name'}),
                        'slug' => str_slug(trim($category->{'category_name'})),
                        'top_id' => preg_replace("/[^0-9]/", '', ltrim(trim($category->{'top_id'}), 0)) ? preg_replace("/[^0-9]/", '', ltrim(trim($category->{'top_id'}), 0)) : null,
                    ]
                );

                $success++;
            }
            else{
                Log::create([
                    "content" => json_encode($category)
                ]);
                $error++;
            }
        }
        $message = "Kateqoriyalar yeniləndi. $success uğurlu $error uğursuz nəticə.";
        return back()->with(['message' => $message, 'message_type' => 'info']);
    }

    public function getBrand()
    {
        $brands = $this->getBrands();

        $success = 0;
        $error = 0;

        foreach ($brands as $brand) {

            if (preg_replace("/[^0-9]/", '', ltrim(trim($brand->{'brand_id'}), 0)) && trim($brand->{'brand_name'})) {
                Brand::updateOrCreate(
                    ['id' => preg_replace("/[^0-9]/", '', ltrim(trim($brand->{'brand_id'}), 0))],
                    [
                        'name' => trim($brand->{'brand_name'}),
                        'slug' => str_slug(trim($brand->{'brand_name'})),
                    ]
                );
                $success++;
            }
            else{
                $error++;
                Log::create([
                    "content" => json_encode($brand)
                ]);
            }
        }
        $message = "Brendlər yeniləndi. $success uğurlu $error uğursuz nəticə.";
        return back()->with(['message' => $message, 'message_type' => 'info']);
    }

    public function getProduct()
    {
        $products = $this->getProducts();

        $success = 0;
        $error = 0;

        foreach ($products as $product) {
            if (
                preg_replace("/[^0-9]/", '', ltrim(trim($product->{'product_code'}), 0)) &&
                trim($product->{'product_name'}) &&
                trim($product->{'measurement'}) &&
                preg_replace("/[^0-9]/", '', ltrim(trim($product->{'category_id'}), 0)) &&
                preg_replace("/[^0-9]/", '', ltrim(trim($product->{'brand_id'}), 0))

            ) {
                $data = array(
                    'product_name' => trim($product->{'product_name'}),
                    'deleted_at' => null,
//                    'discount_date' => isset($product->{'discount_date'}) ? trim($product->{'discount_date'}) : null,
//                    'discount' => isset($product->{'discount'}) ? trim($product->{'discount'}) : null,
//                    'order_arrival' => isset($product->{'order_arrival'}) ? trim($product->{'order_arrival'}) : null,
                    'product_description' => isset($product->{'product_description'}) ? trim($product->{'product_description'}) : null,
                    'slug' => str_slug($product->{'product_name'})
                );

                $data_detail = array(
                    'measurement' => trim($product->{'measurement'})
                );

                $data_price = [];

                $category = [];
                $exits_category = Category::where('id', preg_replace("/[^0-9]/", '', ltrim(trim($product->{'category_id'}), 0)))->first();
                if ($exits_category) {
                    $category = array(
                        $exits_category->id
                    );
                }
                $brands = [];
                $exits_brand = Brand::where('id', preg_replace("/[^0-9]/", '', ltrim(trim($product->{'brand_id'}), 0)))->first();
                if ($exits_brand) {
                    $brands = array(
                        $exits_brand->id
                    );
                }

                $entry = Product::updateOrCreate(
                    ['product_code' => preg_replace("/[^0-9]/", '', ltrim(trim($product->{'product_code'}), 0))],
                    $data
                );

                $entry->detail()->updateOrCreate($data_detail);
                $entry->categories()->sync($category);
                $entry->brands()->sync($brands);

                if ($product->{'Rekvizitler'}){
                    $product_item = Product::where('product_code',  preg_replace("/[^0-9]/", '', ltrim(trim($product->{'product_code'}), 0)))->first();
                    $description = $product_item->product_description . "<table>";
                    foreach ($product->{'Rekvizitler'} as $key => $item){

                        $name = preg_replace("_", " ", $key);
                        $name = preg_replace("e-", "ə", $name);
                        $name = preg_replace("u-", "ü", $name);
                        $name = preg_replace("o-", "ö", $name);
                        $name = preg_replace("i-", "ı", $name);
                        $name = preg_replace("s-", "ş", $name);
                        $name = preg_replace("c-", "ç", $name);
                        $name = preg_replace("E-", "Ə", $name);
                        $name = preg_replace("U-", "Ü", $name);
                        $name = preg_replace("O-", "Ö", $name);
                        $name = preg_replace("I-", "İ", $name);
                        $name = preg_replace("S-", "Ş", $name);
                        $name = preg_replace("C-", "Ç", $name);
                        $description .= "<tr><td>$name</td>";


                        $description .= "<td>$item</td>";


                        $description .= "</tr>";

                    }
                    $description .= "</table>";

                    $product_item->product_description = $description;
                    $product_item->save();
                }


                if(isset($product->{'price_list'})){
                    $id = Product::where('product_code',  preg_replace("/[^0-9]/", '', ltrim(trim($product->{'product_code'}), 0)))->first()->id;
                    if(gettype($product->{'price_list'}) == 'array'){
                        foreach($product->{'price_list'} as $price) {

                            if(isset($price->{'color_title'})){
                                $color = Color::where('title', $price->{'color_title'})->first();
                                if(!$color){
                                    $color = Color::updateOrCreate(['title' => $price->{'color_title'}],[
                                        'title' => $price->{'color_title'},
                                        'name' => $price->{'color_title'}
                                    ]);
                                }
                                $color_id = $color->id;
                                ColorProduct::updateOrcreate([
                                    'color_id' => $color_id,
                                    'product_id' => $id,
                                ]);
                            }
                            else{
                                ColorProduct::where('product_id', $id)->delete();
                                ColorProduct::updateOrcreate([
                                    'color_id' => 1,
                                    'product_id' => $id,
                                ]);
                                $color_id = 1;
                            }

                            // if(isset($price->{'size_name'})){
                            //     $size = Size::where('name', $price->{'size_name'})->first();
                            //     if(!$size){
                            //         $size = Size::updateOrCreate([
                            //             'name' => $price->{'size_name'}
                            //             ]);
                            //     }
                            //     $size_id = $size->id;
                            //     SizeProduct::updateOrcreate([
                            //         'size_id' => $size_id,
                            //         'product_id' => $id,
                            //     ]);
                            // }
                            // else{
                            //     $size_id = null;
                            //     SizeProduct::where('product_id', $id)->delete();
                            // }

                            PriceList::updateOrCreate(
                                [
                                    'product_id' => $id,
                                    'color_id' => $color_id,
                                    'size_id' => null
                                ],
                                [
                                    'wholesale_count' => $price->{'wholesale_count'},
                                    'wholesale_price' => $price->{'wholesale_price'},
                                    'stock_piece' => $price->{'stock_piece'},
                                    'sale_price' => $price->{'sale_price'},
                                ]);

                        }
                    }
                    elseif(gettype($product->{'price_list'}) == 'object'){
                        $price = $product->{'price_list'};

                        if(isset($price->{'color_title'})){
                            $color = Color::where('title', $price->{'color_title'})->first();
                            if(!$color){
                                $color = Color::updateOrCreate(['title' => $price->{'color_title'}],[
                                    'title' => $price->{'color_title'},
                                    'name' => $price->{'color_title'}
                                ]);
                            }
                            $color_id = $color->id;
                            ColorProduct::updateOrcreate([
                                'color_id' => $color_id,
                                'product_id' => $id,
                            ]);
                        }
                        else{
                            ColorProduct::where('product_id', $id)->delete();
                            ColorProduct::updateOrcreate([
                                'color_id' => 1,
                                'product_id' => $id,
                            ]);
                            $color_id = 1;
                        }

                        // if(isset($price->{'size_name'})){
                        //     $size = Size::where('name', $price->{'size_name'})->first();
                        //     if(!$size){
                        //         $size = Size::updateOrCreate([
                        //             'name' => $price->{'size_name'}
                        //             ]);
                        //     }
                        //     $size_id = $size->id;
                        //     SizeProduct::updateOrcreate([
                        //         'size_id' => $size_id,
                        //         'product_id' => $id,
                        //     ]);
                        // }
                        // else{
                        //     $size_id = null;
                        //     SizeProduct::where('product_id', $id)->delete();
                        // }

                        PriceList::updateOrCreate(
                            [
                                'product_id' => $id,
                                'color_id' => $color_id,
                                'size_id' => null
                            ],
                            [
                                'wholesale_count' => $price->{'wholesale_count'},
                                'wholesale_price' => $price->{'wholesale_price'},
                                'stock_piece' => $price->{'stock_piece'},
                                'sale_price' => $price->{'sale_price'},
                            ]);
                    }
                }
                $success++;
            }
            else{
                $error++;
                Log::create([
                    "content" => json_encode($product)
                ]);
            }


        }
        $message = "Məhsullar yeniləndi. $success uğurlu $error uğursuz nəticə.";
        return back()->with(['message' => $message, 'message_type' => 'info']);
    }
}
