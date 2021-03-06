<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class EnvelopeController extends Controller
{
    public function index(){
        return view('manage.pages.envelope.index');
    }

    public function index_data()
    {
        $rows = Contact::select(['contacts.*']);
        return DataTables::eloquent($rows)
            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary view" data-id="' . $row->id .'"> <i class="fa fa-eye"></i> Bax</a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  data-id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="' . $row->id . '" />';

            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->rawColumns(['checkbox', 'action'])
            ->toJson();
    }
    public function view(){
        $rows = Contact::select(['contacts.*'])
            ->where('contacts.id', request('id'))
            ->first();
        return $rows;
    }
    public function delete_data(Request $request)
    {
        $rows = Contact::find($request->input('id'));
        if ($rows->forceDelete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Contact::whereIn('id', $id_array);
        if ($rows->forceDelete()) {
            echo __('admin.Data Deleted');
        }
    }
}
