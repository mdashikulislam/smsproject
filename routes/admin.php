<?php
use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\SingleService;
Route::name('admin.')->middleware('web')->group(function () {
    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function (){
         Route::get('/', 'index');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::get('/single-service',SingleService::class)->name('single-service');
    Route::get('/single-service/datatable', [SingleService::class, 'datatable'])->name('single-service.datatable');

});
