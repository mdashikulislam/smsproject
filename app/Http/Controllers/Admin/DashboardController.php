<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return request()->route('admin.dashboard');
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
}
