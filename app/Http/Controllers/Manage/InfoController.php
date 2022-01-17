<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Image;


class InfoController extends Controller
{
    public function index(){
        return view('manage.pages.info.index');
    }
    public function save(Request $request)
    {
        $data = $request->except('_token', 'logo');

        if (request()->hasFile('logo')) {
            $logo = request()->file('logo');

            $filename = 'logo.' . $logo->extension();

            $destinationPath = 'assets/img/';
            $logo->move($destinationPath, $filename);
            $data['logo'] = $filename;

        }
        if (request()->hasFile('favicon')) {
            $logo = request()->file('favicon');

            $filename = 'favicon.' . $logo->extension();

            $destinationPath = 'assets/img/';
            $logo->move($destinationPath, $filename);
            $data['favicon'] = $filename;
        }

        $update = Info::find(1);
        $update->update($data);

        if ($update) {
            $request->session()->flash('message_icon', 'check');
            $request->session()->flash('message_type', 'success');
            $request->session()->flash('message', 'Məlumat yeniləndi');
        } else {
            $request->session()->flash('message_icon', 'warning');
            $request->session()->flash('message_type', 'warning');
            $request->session()->flash('message', 'Xəta! Zəhmət olmasa bir daha cəhd edin');
        }
        return back();
    }

}
