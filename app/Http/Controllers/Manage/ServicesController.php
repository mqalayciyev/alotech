<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Models\Services;
use Validator;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function index()
    {
        $entry = new Services;
        $services = Services::all();
        return view('manage.pages.services.index', compact('services', 'entry'));
    }
    public function index_data()
    {
        $rows = Services::select(['id', 'services_name', 'services_price', 'created_at', 'updated_at']);
        return DataTables::eloquent($rows)

            ->addColumn('action', function ($row) {
                return '<div>
                <a href="javascript:void(0);" class="btn btn-xs btn-primary edit" id="' . $row->id . '"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'action'])
            ->toJson();
    }

    public function post_data(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'services_name' => 'required',
            'services_price' => 'required'
        ]);


        $error_array = array();
        $success_output = '';

        $data = request()->only('services_name', 'services_price');

        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                $entry = Services::create($data);
                $success_output = '<div class="alert alert-success">' . __('admin.Data Inserted') . '</div>';
            }

            if ($request->get('button_action') == "update") {

                $entry = Services::where('id', $request->get('id'))->firstOrFail();
                $entry->update($data);
                $success_output = '<div class="alert alert-success">' . __('admin.Data Updated') . '</div>';
            }

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
        $rows = Services::find($id);
        $output = array(
            'services_name' => $rows->services_name,
            'services_price' => $rows->services_price,
            'slug' => $rows->slug,
            'top_id' => $rows->top_id,
        );
        echo json_encode($output);
    }

    public function delete_data(Request $request)
    {
        $rows = Services::find($request->input('id'));
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Services::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }
}
