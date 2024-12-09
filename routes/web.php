<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Auth\Login;
use \App\Livewire\Auth\Register;
use \App\Constants\AppConstants;
Route::middleware('guest')->group(function (){
   Route::get(AppConstants::LOGIN_SLUG,Login::class)->name('login');
   Route::get(AppConstants::REGISTER_SLUG,Register::class)->name('register');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',\App\Livewire\Frontend\Home::class)->name('index');
Route::get(AppConstants::FREE_SMS_SLUG,\App\Livewire\Frontend\FreeSms::class)->name('free-sms');
Route::get(AppConstants::PRICING_SLUG,\App\Livewire\Frontend\Pricing::class)->name('pricing');
Route::get(AppConstants::SERVICES_SLUG,\App\Livewire\Frontend\Services::class)->name('services');
Route::get(AppConstants::CONTACT_US_SLUG,\App\Livewire\Frontend\ContactUs::class)->name('contact-us');
Route::middleware('auth')->group(function (){
    Route::get(AppConstants::RELOAD_SLUG,\App\Livewire\Frontend\Reload::class)->name('reload');
});


Route::get('test',[\App\Http\Controllers\HomeController::class,'test']);


Route::get('{slug}',\App\Livewire\Frontend\Page::class)->name('page');



