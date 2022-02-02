<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\OrderReturn;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class ReturnController extends Controller
{
    public function index()
    {
        return view('manage.pages.return.index');
    }
    public function index_data()
    {
        $rows = OrderReturn::select(['order_returns.*', DB::raw("CONCAT(user.first_name,' ',user.last_name) as name")])->leftJoin('user', 'user.id', 'order_returns.user_id')->with(['order', 'user']);
        return DataTables::eloquent($rows)
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(user.first_name,' ',user.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('SP', function ($row) {
                return "<a href=" . route("manage.order.edit", $row->order_id) . ">" . 'SP-' . $row->order_id . "</a>";
            })
            ->editColumn('status', function ($row) {
                $status = ['Baxılmayıb', "Baxılıb", "Qaytarılıb", "Ləğv edilib"];
                return  $status[$row->status];

            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('action', function ($row) {

                return '<div>
                        <a href="javascript:void(0)" class="btn btn-xs btn-info view"  data-id="' . $row->id . '"> <i class="fa fa-eye"></i> Ətraflı</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-success mail"  data-id="' . $row->id . '"> <i class="fa fa-envelope"></i> Email</a>
                        <a href="'.route('manage.return.delete', $row->id) . '" class="btn btn-xs btn-danger"  id="' . $row->id . '"> <i class="fa fa-remove"></i> ' . __('admin.Delete') . '</a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="' . $row->id . '" />';
            })
            ->rawColumns(['checkbox', 'action', 'SP', 'status'])
            ->toJson();
    }

    public function view(){
        $rows = OrderReturn::where('id', request('id'))->first();
        return $rows;
    }

    public function mail(){
        if(!request('message')){
            return response()->json(['status' => 'error']);
        }
        $rows = OrderReturn::where('id', request('id'))->with('user')->first();
        $data['message'] = request('message');
        $data['name'] = $rows->user->first_name . ' ' . $rows->user->last_name;
        Mail::to($rows->user->email)->send(new UserMail($data));

        return response()->json(['status' => 'success']);
    }
}
