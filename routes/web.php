<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Auth\Login;
use \App\Livewire\Auth\Register;
Route::middleware('guest')->group(function (){
   Route::get('login',Login::class)->name('login');
   Route::get('register',Register::class)->name('register');
});


Route::get('/',\App\Livewire\Frontend\Home::class)->name('index');

Route::controller(\App\Http\Controllers\Frontend\HomeController::class)->group(function (){
    Route::get('free-sms','freeSms')->name('free-sms');
    Route::get('pricing','pricing')->name('pricing');
    Route::get('services','services')->name('services');
    Route::get('contact-us','contactUs')->name('contact-us');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
