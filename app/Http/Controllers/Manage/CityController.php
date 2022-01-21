<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    public function index()
    {
        return view('manage.pages.city.index');
    }

    public function index_data()
    {
        $rows = City::select(['city.*']);
        return DataTables::eloquent($rows)
            ->addColumn('action', function ($row) {
                return '<div>
                <input type="hidden" name="sort_order" id="sort_order" value="' . $row->id . '"/>
                <a href="' . route('manage.city.edit', $row->id) . '" class="btn btn-xs btn-primary edit"> <i class="fa fa-edit"></i> ' . __('admin.Edit') . '</a>
                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'action'])
            ->toJson();
    }

    public function form($id = 0)
    {
        $entry = new City;
        if ($id > 0) {
            $entry = City::find($id);
        }

        return view('manage.pages.city.form', compact('entry'));
    }

    public function save($id = 0)
    {
        $data = request()->only('name', 'delivery_days', 'delivery_amount');

        $this->validate(request(), [
            'name' => 'required'
        ]);
        $start_time = request('start_time');
        $end_time = request('end_time');
        $times = [];
        if ($start_time != null) {

            foreach ($start_time as $key => $item) {
                $time['start'] = $item['time'];
                $time['end'] = $end_time[$key]['time'];
                $times[] = $time;
            }
        }
        $data['delivery_time'] = $times;

        if ($id > 0) {
            $entry = City::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = City::create($data);
        }

        return redirect()
            ->route('manage.city.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? __('admin.Updated') : __('admin.Saved'));
    }

    public function delete_data(Request $request)
    {
        $rows = City::find($request->input('id'));
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = City::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }
}
