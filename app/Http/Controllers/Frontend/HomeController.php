<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function freeSms()
    {
        return view('frontend.free-sms');
    }
}
