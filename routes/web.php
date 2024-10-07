<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Frontend\HomeController::class)->group(function (){
    Route::get('/','index')->name('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
