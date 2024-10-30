<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Auth\Login;
use \App\Livewire\Auth\Register;
Route::middleware('guest')->group(function (){
   Route::get('login',Login::class)->name('login');
   Route::get('register',Register::class)->name('register');
});

Route::get('/',\App\Livewire\Frontend\Home::class)->name('index');
Route::get('free-sms',\App\Livewire\Frontend\FreeSms::class)->name('free-sms');
Route::get('pricing',\App\Livewire\Frontend\Pricing::class)->name('pricing');
Route::get('services',\App\Livewire\Frontend\Services::class)->name('services');
Route::get('contact-us',\App\Livewire\Frontend\ContactUs::class)->name('contact-us');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//require __DIR__.'/admin.php';
Route::get('test',function (){
   return \Spatie\Permission\Models\Permission::all();
});
