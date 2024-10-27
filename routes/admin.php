<?php
use Illuminate\Support\Facades\Route;

Route::name('admin.')->middleware('web')->group(function () {
    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function (){
         Route::get('/', 'index');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
    Route::controller(\App\Http\Controllers\Admin\SingleServiceController::class)->group(function (){
        Route::get('/single-service', 'index')->name('single-service');
    });
});
