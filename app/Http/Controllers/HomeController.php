<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        $apiUrl = makeSimApiUrl('buy-sim.php');
        $response = Http::withBasicAuth(env('SIM_API_USERNAME'), env('SIM_API_PASSWORD'))
            ->post($apiUrl, [
                'name' => 'Steve',
                'role' => 'Network Administrator',
            ]);

        dd($response->body());
    }
}
