<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\PriceList;
use App\Models\Size;
use App\Models\SizeProduct;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    public function index()
    {
        return view('manage.pages.product.index');
    }

    public function index_data()
    {
        //leftJoin('product_image', 'product_image.product_id', '=', 'product.id')-> SILINDI.
        $rows = Product::leftJoin('brand_product', 'product.id', '=', 'brand_product.product_id')
            ->leftJoin('brand', 'brand.id', '=', 'brand_product.brand_id')
            ->select([
                'product.*',
                'brand.name',
            ]);
        return DataTables::eloquent($rows)
            ->editColumn('image_name', function ($row) {
                $image = '<img src="';
                $image .= $row->image->image_name != null ? asset("assets/img/products/" . $row->image->image_name) : "http://via.placeholder.com/50x50?text=ProductPhoto";
                $image .= '" class="img-responsive" style="width: 50px; height:50px;">';
                return $image;
            })
            ->editColumn('sale_price', function ($row) {
                return $row->price->first() ? $row->price->first()->sale_price : null;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <a href="' . route('manage.product.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'image_name', 'manage', 'action', 'sale_price'])
            ->toJson();
    }

    public function filter($id)
    {
        return view('manage.pages.product.filter', compact('id'));
    }

    public function filter_data($id)
    {
        $rows = Product::leftJoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->leftJoin('brand_product', 'product.id', '=', 'brand_product.product_id')
            ->leftJoin('brand', 'brand.id', '=', 'brand_product.brand_id')
            ->select([
                'product.*',
                'brand.name',
            ]);
        $rows->where('brand_product.brand_id', $id);

        return DataTables::eloquent($rows)
            ->editColumn('image_name', function ($row) {
                $image = '<img src="';
                $image .= $row->image->image_name != null ? asset("assets/img/products/" . $row->image->image_name) : "http://via.placeholder.com/50x50?text=ProductPhoto";
                $image .= '" class="img-responsive" style="width: 50px; height:50px;">';
                return $image;
            })
            ->editColumn('sale_price', function ($row) {
                return $row->default_price->sale_price;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <a href="' . route('manage.product.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'image_name', 'action', 'sale_price'])
            ->toJson();
    }

    public function form($id = 0)
    {
        $entry = new Product;
        $product_categories = [];
        $product_brands = [];
        $product_colors = [];
        $product_sizes = [];
        if ($id > 0) {
            $entry = Product::find($id);
            $product_categories = $entry->categories()->pluck('category_id')->all();
            $product_brands = $entry->brands()->pluck('brand_id')->all();
            $product_colors = $entry->colors()->pluck('color_id')->all();
            $product_sizes = $entry->sizes()->pluck('size_id')->all();
        }

        // return  $product_categories;

        $entry_category = new Category();

        $categories = Category::all();
        $brands = Brand::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();
        $sizes = Size::all();
        $colors = Color::all();
        $images = ProductImage::all();
        // echo "<pre>";
        // print_r($entry->colors);
        return view('manage.pages.product.form', compact('entry', 'product_colors', 'product_sizes', 'categories', 'product_categories', 'images', 'brands', 'tags', 'colors', 'sizes',  'entry_category', 'product_brands'));
    }
    public function categories()
    {
        $categories = Category::all();
        $output = '';
        foreach ($categories as $category) {

            if ($category->top_id == null) {
                $output .= '<option style="color:#000;" value="' . $category->id . '">' . $category->category_name . '</option>';
                foreach ($category->alt_category as $alt_category) {
                    if ($alt_category->second_id == null) {
                        $output .= '<option value="' . $alt_category->id . '"> - - ' . $alt_category->category_name . '</option>';
                        foreach ($alt_category->second_category as $second_category) {
                            $output .= '<option value="' . $alt_category->id . '"> - - - -' . $second_category->category_name . '</option>';
                        }
                    }
                }
            }
        }
        echo $output;
    }
    public function save($id = 0)
    {
        $data = request()->only('product_name', 'order_arrival', 'meta_title', 'sku', 'meta_discription', 'slug', 'product_description',  'discount', 'discount_date', 'one_or_more', 'other_count', 'other_bonus', 'bonus_comment');

        $data['slug'] = str_slug(request('product_name'));
        request()->merge(['slug' => $data['slug']]);
        // return request();
        $this->validate(request(), [
            'product_name' => 'required',
            'measurement' => 'required',
            'categories' => 'required',
            'brand' => 'required',
            'slug' => Rule::unique('product', 'slug')->ignore($id)
        ]);






        $data_detail = request()->only('measurement', 'show_new_collection', 'show_hot_deal', 'show_best_seller', 'show_latest_products', 'show_deals_of_the_day', 'show_picked_for_you');

        $categories = request('categories');
        $exits_category = Category::where('category_name', $categories)->first();
        if ($exits_category) {
            $categories = array(
                $exits_category->id
            );
        }
        $brands = request('brand');
        $exits_brand = Brand::where('name', $brands)->first();
        if ($exits_brand) {
            $brands = array(
                $exits_brand->id
            );
        }
        // $tags_old = request('tag');
        // if ($tags_old) {
        //     $tags = array();
        //     foreach ($tags_old as $tag) {
        //         $exists_tag = Tag::where('name', $tag)->first();
        //         if ($exists_tag) {
        //             array_push($tags, $exists_tag->id);
        //         } else {
        //             $form = Tag::create([
        //                 'name' => $tag
        //             ]);
        //             $form->save();
        //             $exists_tag = Tag::where('name', $tag)->first();
        //             array_push($tags, $exists_tag->id);
        //         }
        //     }
        // }
        if(!request('color')){
            Color::updateOrCreate(['id' => 1],['title' => 'none', 'name' => 'none']);
            $colors_old = ['none'];
        }
        else{
            $colors_old = request('color');
        }

        if ($colors_old) {
            $colors = array();
            foreach ($colors_old as $color) {
                $exists_color = Color::where('name', $color)->first();
                if ($exists_color) {
                    array_push($colors, $exists_color->id);
                }
            }
        }
        $sizes_old = request('size');
        if ($sizes_old) {
            $sizes = array();
            foreach ($sizes_old as $size) {
                $exists_size = Size::where('name', $size)->first();
                if ($exists_size) {
                    array_push($sizes, $exists_size->id);
                }
            }
        }
        function codeGenerate(){
            $code = rand(1, 36000);
            $product = Product::where('product_code', $code)->first();
            if($product){
                codeGenerate();
            }
            return $code;
        }



        if ($id > 0) {
            $entry = Product::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->detail()->update($data_detail);
            // $entry->price()->update($data_price);
            $entry->categories()->sync($categories);
            // $entry->suppliers()->sync($suppliers);
            $entry->brands()->sync($brands);
            if ($sizes_old) {
                $entry->sizes()->sync($sizes);
            }
            else{
                SizeProduct::where('product_id', $entry->id)->delete();
            }
            if ($colors_old) {
                $entry->colors()->sync($colors);
            }
            else{
                ColorProduct::where('product_id', $entry->id)->delete();
            }
        } else {
            $data['product_code'] = codeGenerate();
            $entry = Product::create($data);
            $entry->detail()->create($data_detail);
            // $entry->price()->create($data_price);
            $entry->categories()->attach($categories);
            // $entry->suppliers()->attach($suppliers);
            $entry->brands()->attach($brands);
            if ($sizes_old) {
                $entry->sizes()->attach($sizes);
            }
            if ($colors_old) {
                $entry->colors()->attach($colors);
            }
        }


        if (request()->hasFile('product_images')) {
            $images = ProductImage::where('product_id', $id);


            $product_images = request()->file('product_images');
            $product_images = request()->product_images;

            foreach ($product_images as $array => $product_image) {
                $filename = 'product-' . $array . '_' . $entry->id . '_' . time() . '.webp';
                $filename_main = 'main_product-' . $array . '_' . $entry->id . '_' . time() . '.webp';
                $filename_thumb = 'thumb_product-' . $array . '_' . $entry->id . '_' . time() . '.webp';
                if ($product_image->isValid()) {
                    $path = public_path('assets/img/products/' . $filename);
                    $path_main = public_path('assets/img/products/' . $filename_main);
                    $path_thumb = public_path('assets/img/products/' . $filename_thumb);

                    $square = Image::canvas(1000, 943, array(255, 255, 255));

                    $img = Image::make($product_image->getRealPath())
                        ->resize(1000, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $square->insert($img, 'center');
                    $square->save($path_main);
                    $square->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path_thumb);

                    $rectangle = Image::canvas(300, 283, array(255, 255, 255));
                    $img_rec = Image::make($product_image->getRealPath())
                        ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $rectangle->insert($img_rec, 'center');
                    $rectangle->save($path);

                    $product_image_model = new ProductImage;
                    $product_image_model->product_id = $entry->id;
                    $product_image_model->image_name = $filename;
                    $product_image_model->color_id = request('image_color_id');


                    $product_image_model->main_name = $filename_main;
                    $product_image_model->thumb_name = $filename_thumb;
                    $product_image_model->save();

                }
            }
        }

        return redirect()
            ->route('manage.product.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? __('admin.Updated') : __('admin.Saved'));
    }

    public function delete_data(Request $request)
    {
        $rows = Product::find($request->input('id'));
        $images = ProductImage::where('product_id', $rows->id);
        $image_path = app_path("assets/img/products/{$images->image_name}");
        $image_path2 = app_path("assets/img/products/{$images->thumb_name}");
        $image_path3 = app_path("assets/img/products/{$images->main_name}");
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        if(file_exists($image_path2))
        {
            unlink($image_path2);
        }
        if(file_exists($image_path3))
        {
            unlink($image_path3);
        }
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Product::whereIn('id', $id_array);
        foreach ($rows as $row) {
            $images = ProductImage::where('product_id', $row->id);
            $image_path = app_path("assets/img/products/{$images->image_name}");
            $image_path2 = app_path("assets/img/products/{$images->thumb_name}");
            $image_path3 = app_path("assets/img/products/{$images->main_name}");
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            if(file_exists($image_path2))
            {
                unlink($image_path2);
            }
            if(file_exists($image_path3))
            {
                unlink($image_path3);
            }
        }
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function load_images(Request $request, $id)
    {

        $rows = ProductImage::where('product_id', $id)->orderBy('cover', 'desc');

        return DataTables::eloquent($rows)
            ->editColumn('image', function ($row) {
                $image = '<img src="';
                $image .= $row->image_name != null ? asset("assets/img/products/" . $row->image_name) : "http://via.placeholder.com/50x50?text=ProductPhoto";
                $image .= '" class="img-responsive" style="width: 50px; height: auto;">';
                return $image;
            })
            ->addColumn('colors', function ($row) {
                $product = Product::find($row->product_id);
                $colors = '';
                if(count($product->colors)){
                    $colors .= '<select class="form-control change_color" name="change_color" data-id="' . $row->id . '">
                    <option value="">Rəng Seç</option>';
                    foreach ($product->colors as $color) {
                        $selected = $row->color_id == $color->id ? 'selected' : null;
                        $colors .= '<option value="'. $color->id . '" ' . $selected . '  style="background-color: ' . $color->name . '">' . $color->title . '</option>';
                    }
                    $colors .= '</select>';
                }
                return $colors;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <button type="button" class="down-up btn btn-success btn-sm" data-id="' . $row->id . '"><i class="fa fa-sort-asc"></i></button>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger btn_close" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->rawColumns(['image', 'action', 'colors'])
            ->toJson();
    }

    public function remove_image(Request $request)
    {
        $image_id = $request->get('id');
        $image_rows = ProductImage::find($image_id);
        $image_path = app_path("assets/img/products/{$image_rows->image_name}");
        $image_path2 = app_path("assets/img/products/{$image_rows->thumb_name}");
        $image_path3 = app_path("assets/img/products/{$image_rows->main_name}");
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        if(file_exists($image_path2))
        {
            unlink($image_path2);
        }
        if(file_exists($image_path3))
        {
            unlink($image_path3);
        }
        $image_rows->delete();
    }

    public function price_post_data(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'sale_price' => 'required',
            'product_id' => 'required',
            'stock_piece' => 'required',
        ]);


        $id = $request->id;

        $error_array = array();
        $success_output = '';

        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $messages) {
                $error_array[] = $messages;
            }
        }
        else {
            PriceList::updateOrCreate(
                [
                    'product_id' => $request->product_id,
                    'color_id' => $request->color,
                    'size_id' => $request->size,
                ],
                [
                    'sale_price' => $request->sale_price,
                    'wholesale_count' => $request->wholesale_price > 0 && $request->wholesale_count ? $request->wholesale_count : null,
                    'wholesale_price' => $request->wholesale_price > 0 && $request->wholesale_count > 0 ? $request->wholesale_price : null,
                    'stock_piece' => $request->stock_piece,
                ]
            );

            $success_output = '<div class="alert alert-success">' . __('admin.Data Inserted') . '</div>';
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );
        return response()->json($output);
    }
    public function price_fetch_data(Request $request)
    {
        $id  = $request->get('id');
        $data = PriceList::find($id);
        return response()->json($data);
    }

    public function price_delete_data(Request $request)
    {
        $id  = $request->get('id');
        $rows = PriceList::find($id);
        $rows->delete();
    }
    public function delete_all(Request $request)
    {
        Product::query()->delete();
        $image_rows = ProductImage::all();

        foreach ($image_rows as $row) {
            $image_path = app_path("assets/img/products/{$row->image_name}");
            $image_path2 = app_path("assets/img/products/{$row->thumb_name}");
            $image_path3 = app_path("assets/img/products/{$row->main_name}");
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            if(file_exists($image_path2))
            {
                unlink($image_path2);
            }
            if(file_exists($image_path3))
            {
                unlink($image_path3);
            }
        }
        return back();
    }

    public function cover_change()
    {
        $id = request('id');
        $flight = ProductImage::find($id);
        ProductImage::where('product_id', $flight->product_id)->update(['cover' => 0]);
        ProductImage::where('id', $id)->update(['cover' => 1]);

    }
    public function change_color()
    {
        $id = request('id');
        $color_id = request('color_id');
        ProductImage::where('id', $id)->update(['color_id' => $color_id]);
    }
}
