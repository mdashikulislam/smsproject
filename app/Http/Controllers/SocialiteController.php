<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function telegram()
    {
        return Socialite::driver('telegram')->redirect();
    }

    public function callback()
    {
        dd('callback');
    }
}
