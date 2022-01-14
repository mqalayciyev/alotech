<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Depot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DepotController extends Controller
{
    public function index()
    {
        return view('manage.pages.depot.index');
    }

    public function index_data()
    {
        $rows = Depot::select(['depots.*']);
        return DataTables::eloquent($rows)
            ->editColumn('default', function ($row) {
                $default = $row->default ? 'Default' : null;
                return $default;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <input type="hidden" name="sort_order" id="sort_order" value="' . $row->id . '"/>
                <a href="' . route('manage.depot.edit', $row->id) . '" class="btn btn-xs btn-primary edit"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'action', 'default'])
            ->toJson();
    }

    public function form($id = 0)
    {
        $entry = new Depot;
        if ($id > 0) {
            $entry = Depot::find($id);
        }

        return view('manage.pages.depot.form', compact('entry'));
    }

    public function save($id = 0)
    {

        $data = request()->only('name', 'address', 'phone', 'default');

        $this->validate(request(), [
            'name' => 'required'
        ]);
        $data['default'] = request()->has('default') && request('default') == 1 ? 1 : null;

        if ($id > 0) {
            $entry = Depot::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = Depot::create($data);
        }

        return redirect()
            ->route('manage.depot.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? __('admin.Updated') : __('admin.Saved'));
    }

    public function delete_data(Request $request)
    {
        $rows = Depot::find($request->input('id'));
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Depot::whereIn('id', $id_array);
        if ($rows->delete()) {
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
            $flight = Depot::find($id);
            $flight->order = $index;
            $flight->save();
        }
    }
}
