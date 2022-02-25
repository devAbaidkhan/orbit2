<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/front-end/routes.php';
Route::get('/', [\App\Http\Controllers\FrontEnd\HomeController::class,'index']);


// User Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('voyager.logout');
});

Route::get('unauthorized',[\App\Http\Controllers\FrontEnd\HomeController::class,'unauthorized']);


