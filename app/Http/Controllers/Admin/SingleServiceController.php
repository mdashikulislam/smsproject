<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SingleService;
use Yajra\DataTables\DataTables;

class SingleServiceController extends Controller
{
    public function index()
    {
        if (request()->ajax()){
            return DataTables::of(SingleService::query())

                ->make(true);
        }
        return view('admin.single-service.index');
    }
}
