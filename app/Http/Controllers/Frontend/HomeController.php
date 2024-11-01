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

    public function pricing()
    {
        return view('frontend.pricing');
    }
    public function services()
    {
        return view('frontend.services');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }
}
