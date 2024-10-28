<?php
use Illuminate\Support\Facades\Route;

Route::name('admin.')->middleware('web')->group(function () {
    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function (){
         Route::get('/', 'index');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
    Route::get('/single-service',\App\Livewire\Admin\SingleService::class)->name('single-service');
    Route::get('/admin/single-service/datatable', [\App\Livewire\Admin\SingleService::class, 'datatable'])->name('single-service.datatable');

});
