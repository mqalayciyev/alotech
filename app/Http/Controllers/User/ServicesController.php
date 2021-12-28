<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('user.pages.services', compact('services'));
    }
}
