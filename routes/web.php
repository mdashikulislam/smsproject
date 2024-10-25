<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Frontend\HomeController::class)->group(function (){
    Route::get('/','index')->name('index');
    Route::get('free-sms','freeSms')->name('free-sms');
    Route::get('pricing','pricing')->name('pricing');
    Route::get('services','services')->name('services');
    Route::get('contact-us','contactUs')->name('contact-us');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
