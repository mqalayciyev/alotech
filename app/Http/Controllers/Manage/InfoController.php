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
        $data = $request->except('_token', 'logo', 'favicon');
        
        $info = Info::find(1);

        if (request()->hasFile('logo')) {
            $logo = request()->file('logo');

            $filename = 'logo_' . time() . "." . $logo->extension();

            $destinationPath = public_path('assets/img/');
            $logo->move($destinationPath, $filename);
            $data['logo'] = $filename;
            $image = app_path("assets/img/{$info->logo}");
            if(file_exists($image))
            {
                unlink($image);
            }

        }
        if (request()->hasFile('favicon')) {
            $logo = request()->file('favicon');

            $filename = 'favicon_' . time() . "." . $logo->extension();

            $destinationPath = public_path('assets/img/');
            $logo->move($destinationPath, $filename);
            $data['favicon'] = $filename;
            
            $image = app_path("assets/img/{$info->favicon}");
            if(file_exists($image))
            {
                unlink($image);
            }
        }
        
        
        $update = Info::where('id', 1)->update($data);
        
        if ($update) {
            $request->session()->flash('message_icon', 'check');
            $request->session()->flash('message_type', 'success');
            $request->session()->flash('message', 'Məlumat yeniləndi');
        } else {
            $request->session()->flash('message_icon', 'warning');
            $request->session()->flash('message_type', 'info');
            $request->session()->flash('message', 'Yenilənəcək məlumat yoxdur');
        }
        return redirect()->route('manage.info');
    }

}
