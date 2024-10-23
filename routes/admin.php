<?php
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function (){
        Route::get('/', 'index');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
});
