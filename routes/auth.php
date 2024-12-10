<?php
use App\Constants\AppConstants;
use \App\Livewire\Auth\Login;
use \App\Livewire\Auth\Register;
Route::middleware('guest')->group(function (){
    Route::get(AppConstants::LOGIN_SLUG,Login::class)->name('login');
    Route::get(AppConstants::REGISTER_SLUG,Register::class)->name('register');
});
