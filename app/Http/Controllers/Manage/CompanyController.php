<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index()
    {
        return view('manage.pages.company.index');
    }

    public function index_data()
    {
        $rows = Company::select('companies.*');

        return DataTables::eloquent($rows)
            ->editColumn('image', function ($row) {
                $image = '<img src="';
                $image .= $row->image != null ? asset("assets/img/company/" . $row->image) : "http://via.placeholder.com/310x188";
                $image .= '" class="img-responsive" style="width: 130px; min-width: 100%; height: auto;">';
                return $image;
            })
            ->editColumn('active', function ($row) {
                return $row->active ? "<span class='label label-success'>Aktiv</span>" : "<span class='label label-default'>Passiv</span>";
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <input type="hidden" name="sort_order" id="sort_order" value="' . $row->id . '"/>
                <a href="' . route('manage.company.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'image', 'active', 'action'])
            ->toJson();
    }

    public function form($id = null)
    {
        $flight = new Company();
        if ($id > 0) {
            $flight = Company::find($id);
        }
        return view('manage.pages.company.form', compact('flight'));
    }

    public function save()
    {

        $validator = Validator::make(request()->all(), [
            'slug' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Link boş ola bilməz']);
        }

        $data = request()->only('slug', 'active');
        $id = request('id');

        if (request()->hasFile('image')) {

            $rows = Company::find($id);

            if($rows){
                $image_path = app_path("assets/img/company/{$rows->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }

            $image = request()->file('image');
            $image = request()->image;

            $filename = 'company_' . time().'.webp';

            $path = public_path('assets/img/company/' . $filename);
            $square = Image::canvas(310, 188, array(255, 255, 255));

            $img = Image::make($image->getRealPath())
                        ->resize(310, null, function ($constraint) {
                        $constraint->aspectRatio();
            });
            $square->insert($img, 'center');
            $square->save($path);

            $data['image'] = $filename;
        }
        if ($id > 0) {
            $flight = Company::find($id);
            $flight->update($data);
            $message = 'Məlumat yeniləndi';
        } else {
            $validator = Validator::make(request()->all(), [
                'image' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => 'Şəkil boş ola bilməz']);
            }

            $data['order'] = Company::where('deleted_at', null)->count() + 1;
            $flight = Company::create($data);
            $message = 'Məlumat əlavə edildi';
        }
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function delete_data(Request $request)
    {
        $rows = Company::find($request->input('id'));

        $image_path = app_path("assets/img/company/{$rows->image}");
        if (File::exists($image_path)) {
            unlink($image_path);
        }

        if ($rows->forceDelete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Company::whereIn('id', $id_array);
        foreach ($rows as $row) {
            $image_path = app_path("assets/img/company/{$row->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        if ($rows->forceDelete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function reorder()
    {
        $serialize = request('serialize');
        $ids = explode("&sort_order=", $serialize);
        foreach ($ids as $index => $id) {
            if ($index == 0) {
                continue;
            }
            $id = (int)$id;
            $flight = Company::find($id);
            $flight->order = $index;
            $flight->save();
        }
    }
}
