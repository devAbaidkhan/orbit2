<?php
use Illuminate\Support\Facades\Route;

Route::get('register',[\App\Http\Controllers\FrontEnd\Auth\RegisterController::class,'index'])->name('register');
Route::post('register/save',[\App\Http\Controllers\FrontEnd\Auth\RegisterController::class,'store'])->name('register.save');
