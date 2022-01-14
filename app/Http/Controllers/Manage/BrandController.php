<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use Image;

class BrandController extends Controller
{

    public function index()
    {
        return view('manage.pages.brand.index');
    }

    public function index_data()
    {
        $brands = Brand::select([
            'brand.*',
            DB::raw('count(brand_product.brand_id) as brand_products')
        ])
            ->leftJoin('brand_product', 'brand.id', '=', 'brand_product.brand_id')
            ->leftJoin('product', 'product.id', '=', 'brand_product.product_id')
            ->groupBy('brand_product.brand_id', 'brand.id');
        return DataTables::eloquent($brands)
            ->addColumn('action', function ($brand) {
                if(auth('manage')->user()->is_manage == 2){
                    $disabled = 'none';
                }
                else{
                    $disabled = '';
                }
                return '<div>
                <a href="' . route('manage.product.filter', $brand->id) . '" class="btn btn-xs btn-success see"> <i class="fa fa-eye"></i> ' . __('admin.See') . '</a>
                <a href="javascript:void(0);" class="btn btn-xs btn-primary edit" id="' . $brand->id . '"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete" style="display: ' . $disabled .'" id="' . $brand->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('image', function ($brand) {
                return $brand->image ? "<img width='80' src='". asset('assets/img/brand/' . $brand->image) ."'>" : "<img width='80' src='". asset('assets/img/woocommerce-placeholder-300x300.png') ."'>";
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'action', 'image'])
            ->toJson();
    }

    public function post_data(Request $request)
    {
        $id = $request->get('id');
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:brand,name',
            'name' => Rule::unique('brand')->ignore($id)
        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                $form = new Brand([
                    'name' => $request->get('name'),
                    'slug' => str_slug($request->get('name')),
                    'description' => $request->get('description'),
                ]);
                $form->save();
                $success_output = '<div class="alert alert-success">' . __('admin.Data Inserted') . '</div>';
            }

            if ($request->get('button_action') == "update") {
                $rows = Brand::find($request->get('id'));
                $rows->name = $request->get('name');
                $rows->slug = str_slug($request->get('name'));
                $rows->description = $request->get('description');
                $rows->save();
                $success_output = '<div class="alert alert-success">' . __('admin.Data Updated') . '</div>';
            }

        }
        if(request()->has('brand_image_delete')){
            
            $rows = Brand::find($id);
            $image_path = app_path("assets/img/brand/{$rows->image}");
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            Brand::where('id', $request->get('id'))->update([
                'image' => null
                ]);
        }
        if(request()->hasFile('brand_image')){
            $rows = Brand::find($id);
            $image_path = app_path("assets/img/brand/{$rows->image}");
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            $product_image = request()->file('brand_image');

            $filename = str_slug(request('name')) . '_' . time().'.webp';
            $path = public_path('assets/img/brand/' . $filename);
            $square = Image::canvas(300, 300, array(255, 255, 255));

            $img = Image::make($product_image->getRealPath())
                    ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
            });
            $square->insert($img, 'center');
            $square->save($path);
            Brand::where('id', $request->get('id'))->update([
                'image' => $filename
            ]);
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
    }

    public function fetch_data(Request $request)
    {
        $id = $request->input('id');
        $rows = Brand::find($id);

        if($rows->image){
            $img = asset('assets/img/brand/' . $rows->image);
        }
        else{
            $img = asset('assets/img/woocommerce-placeholder-300x300.png');
        }
        $output = array(
            'name' => $rows->name,
            'brand_image_view' => $img,
            'slug' => $rows->slug,
            'description' => $rows->description
        );
        echo json_encode($output);
    }

    public function delete_data(Request $request)
    {
        $rows = Brand::find($request->input('id'));
        $image_path = app_path("assets/img/brand/{$rows->image}");
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Brand::whereIn('id', $id_array);
        foreach ($rows as $row) {
            $image_path = app_path("assets/img/brand/{$row->image}");
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
        }
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }
    public function delete_all(Request $request)
    {
        Brand::query()->delete();
        return back();
    }

}
