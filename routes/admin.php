<?php
use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\SingleService;
use \App\Livewire\Admin\Dashboard;
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/single-service',SingleService::class)->name('single-service');
    Route::get('/single-service/datatable', [SingleService::class, 'datatable'])->name('single-service.datatable');
});
