<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $entry = new Category;
        $categories = Category::all();

        return view('manage.pages.category.index', compact('categories', 'entry'));
    }

    public function index_data()
    {
        $rows = Category::select(['id', 'top_id', 'second_id', 'category_name', 'category_view', 'slug', 'created_at', 'updated_at']);
        return DataTables::eloquent($rows)
            ->addColumn('parent_category', function ($row) {
                $name = '';
                if($row->top_id == null && $row->second_id == null){
                    $name = "Əsas Kateqoriya";
                }
                if($row->top_id != null && $row->second_id != null){
                    $name = $row->second_top_category->category_name;
                }
                if($row->top_id != null && $row->second_id == null){
                    $name = $row->top_category->category_name;
                }

                return $name;
            })
            ->addColumn('image', function ($row) {
                return $row->category_image ? "<img style='width: 50px;' src='".asset('assets/img/category/'. $row->category_image)."' alt='".$row->category_image."'>" : "<img style='width: 50px;' src='" . asset('assets/img/woocommerce-placeholder-300x300.png') . "' alt='catgory_image'>";
            })
            ->addColumn('category_view', function ($row) {
                return $row->category_view ? "Göstərilir" : null;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <a href="javascript:void(0);" class="btn btn-xs btn-primary edit" id="' . $row->id . '"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->orderColumn('parent_category', '-top_id $1')
            ->rawColumns(['checkbox', 'image', 'action', 'category_view'])
            ->toJson();
    }

    public function post_data(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'category_name' => 'required'
        ]);


        $error_array = array();
        $success_output = '';

        $data = request()->only('category_name', 'category_view', 'slug', 'top_id', 'no_order_amount');

        if(request('top_id')){
            $category = Category::find(request('top_id'));

            if($category->top_id){
                $data['top_id'] = $category->top_id;
                $data['second_id'] = $category->id;
                $data['slug'] =  str_slug($category->top_category->category_name) . '-' . str_slug($category->category_name) . '-' . str_slug(request('category_name'));
            }
            else{
                $data['slug'] =  str_slug($category->category_name) . '-' . str_slug(request('category_name'));
            }
        }
        else{
            $data['slug'] = str_slug(request('category_name'));
        }

        request()->merge(['slug' => $data['slug']]);


        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                $entry = Category::create($data);
                $success_output = '<div class="alert alert-success">' . __('admin.Data Inserted') . '</div>';
            }

            if ($request->get('button_action') == "update") {

                $entry = Category::where('id', $request->get('id'))->firstOrFail();
                $entry->update($data);
                $success_output = '<div class="alert alert-success">' . __('admin.Data Updated') . '</div>';
            }

        }
        if(request()->has('category_image_delete')){
            $rows = Category::where('id', $entry->id)->first();
            if($rows){
                $image_path = app_path("assets/img/category/{$rows->category_image}");
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            Category::where('id', $entry->id)->update([
                'category_image' => null
            ]);
        }
        if(request()->hasFile('category_image')){
            $rows = Category::where('id', $entry->id)->first();
            if($rows){
                $image_path = app_path("assets/img/category/{$rows->category_image}");
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }

            $file = $request->file('category_image');

            $filename = $data['slug'] . '_' . time().'.'.request()->file('category_image')->getClientOriginalName();

            $destinationPath = 'assets/img/category/';
            $file->move($destinationPath, $filename);

            Category::where('id', $entry->id)->update([
                'category_image' => $filename
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
        $rows = Category::find($id);
        if($rows->category_image){
            $img = asset('assets/img/category/' . $rows->category_image);
        }
        else{
            $img = asset('assets/img/woocommerce-placeholder-300x300.png');
        }
        $output = array(
            'category_name' => $rows->category_name,
            'category_view' => $rows->category_view,
            'no_order_amount' => $rows->no_order_amount,
            'category_image_view' => $img,
            'slug' => $rows->slug,
            'top_id' => $rows->top_id,
        );
        echo json_encode($output);
    }

    public function delete_data(Request $request)
    {
        $rows = Category::find($request->input('id'));
        $image_path = app_path("assets/img/category/{$rows->category_image}");
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
        $rows = Category::whereIn('id', $id_array);
        foreach ($rows as $row) {
            $image_path = app_path("assets/img/category/{$row->category_image}");
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
        Category::query()->delete();
        return back();
    }
}
