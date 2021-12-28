<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiKey;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;

class ApiKeyController extends Controller
{
    public function index()
    {
        $entry = new ApiKey;
        $apikeys = ApiKey::all();
        return view('manage.pages.api.index', compact('apikeys', 'entry'));
    }

    public function index_data()
    {
        $rows = ApiKey::select('api_keys.*');
        return DataTables::eloquent($rows)
            ->editColumn('api_token', function ($row) {
                return '<input type="text" class="form-control copy-clipboard" readonly style="width: 100%;" value="'.$row->api_token.'">';
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <a href="javascript:void(0);" class="btn btn-xs btn-primary edit" id="' . $row->id . '"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                </div>';
            })
            ->rawColumns(['action', 'api_token'])
            ->toJson();
    }

    public function post_data(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => $validation->errors()]);
        }


        $data = request()->only('name');
        if ($request->get('button_action') == "insert") {
            $data['api_token'] = str_random(100);
            $entry = ApiKey::create($data);
        }

        if ($request->get('button_action') == "update") {
            $entry = ApiKey::where('id', $request->get('id'))->firstOrFail();
            $entry->update($data);
        }

        return response()->json(['status' => 'success']);
    }

    public function fetch_data(Request $request)
    {
        $id = $request->input('id');
        $rows = ApiKey::find($id);
        $output = array(
            'name' => $rows->name
        );
        echo json_encode($output);
    }

    public function delete_data(Request $request)
    {
        $rows = ApiKey::find($request->input('id'));
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = ApiKey::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }
}
