<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class LogsController extends Controller
{
    public function index(){
        return view('manage.pages.logs.index');
    }

    public function index_data()
    {
        $rows = Log::select(['logs.*'])->orderByDesc('created_at');
        return DataTables::eloquent($rows)
            ->addColumn('content', function ($row) {
                $content = json_decode($row->content);
                $text = "<div class='logs-content' style='max-height: 300px; overflow: auto; border: 1px solid silver; padding: 5px'>";
                $text .= "<pre>". json_encode($content, JSON_PRETTY_PRINT) ."</pre>";
                $text .= "</div>";
                return $text;
            })
            ->rawColumns(['content'])
            ->toJson();
    }
}
