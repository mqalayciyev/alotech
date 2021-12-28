<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index()
    {
        return view('manage.pages.blog.index');
    }
    public function index_data()
    {
        $rows = Blog::select(['blogs.*']);
        return DataTables::eloquent($rows)
            ->editColumn('blog_image', function ($row) {
                $image = '<img src="';
                $image .= $row->blog_image != null ? asset("assets/img/blog/" . $row->blog_image) : "http://via.placeholder.com/1580x50?text=SliderPhoto(1140x360)";
                $image .= '" class="img-responsive" style="width: 130px; min-width: 100%; height: auto;">';
                return $image;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <input type="hidden" name="sort_order" id="sort_order" value="' . $row->id . '"/>
                <a href="' . route('manage.blog.edit', $row->id) . '" class="btn  btn-sm btn-primary edit"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'blog_image', 'action'])
            ->toJson();
    }

    public function form($id = null)
    {
        $flight = new Blog;
        if ($id > 0) {
            $flight = Blog::find($id);
        }
        return view('manage.pages.blog.form', compact('flight'));
    }

    public function save()
    {

        $validator = Validator::make(request()->all(), [
            'blog_title' => 'required',
            'blog_content' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        $id = request('id');
        $data = request()->only('blog_title', 'blog_content');
        $data['slug'] = str_slug(request('blog_title'));
        if(request()->hasFile('image')){

            $image = request()->file('image');
            $image = request()->image;

            $filename = 'blog_' . time().'.webp';

            $path = public_path('assets/img/blog/' . $filename);
            $square = Image::canvas(1170, 635, array(255, 255, 255));

            $img = Image::make($image->getRealPath())
                    ->resize(1170, null, function ($constraint) {
                    $constraint->aspectRatio();
            });

            $square->insert($img, 'center');
            $square->save($path);


            $data['blog_image'] = $filename;
        }

        if ($id > 0) {
            $flight = Blog::find($id);
            $flight->update($data);
            $message = 'Məlumat yeniləndi';
        } else {
            $flight = Blog::create($data);
            $message = 'Məlumat əlavə edildi';
        }

        return response()->json(['status' => 'success', 'message' => $message]);

    }
    // public function delete_data(Request $request)
    // {
    //     $rows = Slider::find($request->input('id'));
    //     if ($rows->delete()) {
    //         echo __('admin.Data Deleted');
    //     }
    // }

    // public function mass_remove(Request $request)
    // {
    //     $id_array = $request->input('id');
    //     $rows = Slider::whereIn('id', $id_array);
    //     if ($rows->delete()) {
    //         echo __('admin.Data Deleted');
    //     }
    // }
}
