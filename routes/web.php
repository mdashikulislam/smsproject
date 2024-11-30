<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Auth\Login;
use \App\Livewire\Auth\Register;
Route::middleware('guest')->group(function (){
   Route::get('login',Login::class)->name('login');
   Route::get('register',Register::class)->name('register');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',\App\Livewire\Frontend\Home::class)->name('index');
Route::get('free-sms',\App\Livewire\Frontend\FreeSms::class)->name('free-sms');
Route::get('pricing',\App\Livewire\Frontend\Pricing::class)->name('pricing');
Route::get('services',\App\Livewire\Frontend\Services::class)->name('services');
Route::get('contact-us',\App\Livewire\Frontend\ContactUs::class)->name('contact-us');
Route::get(RELOAD_SLUG,\App\Livewire\Frontend\Reload::class)->name('reload');

Route::get('test',[\App\Http\Controllers\HomeController::class,'test']);


Route::get('{slug}',\App\Livewire\Frontend\Page::class)->name('page');



