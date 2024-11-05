<?php

use App\Livewire\Admin\PhoneNumberList;
use Illuminate\Support\Facades\Route;
use \App\Livewire\Admin\SingleService;
use \App\Livewire\Admin\Dashboard;
use \App\Livewire\Admin\MessageList;
use \App\Livewire\Admin\Customer;
use \App\Livewire\Admin\Cms;
use \App\Livewire\Admin\AccessControl\Role;
use \App\Livewire\Admin\AccessControl\ManageAdmin;
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/single-service',SingleService::class)->name('single-service');
    Route::get('/single-service/datatable', [SingleService::class, 'datatable'])->name('single-service.datatable');
    Route::prefix('access-control')->name('access-control.')->group(function () {
        Route::get('manage-role',Role::class)->name('manage-role');
        Route::get('manage-admin',ManageAdmin::class)->name('manage-admin');
    });
    Route::get('message-list',MessageList::class)->name('message-list');
    Route::get('phone-number-list',PhoneNumberList::class)->name('phone-number-list');
    Route::get('customers',Customer::class)->name('customers');
    Route::get('cms',Cms::class)->name('cms');
});
