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

Route::get('/staff-dashboard', function () {
    return view('front-end.dashboard.staff');
});

Route::get('/staff-detail-dashboard', function () {

    return view('front-end.dashboard.profile-detail');
});

Route::get('/staff-religion', function () {
    return view('front-end/profile/company/staff/profile-dashboard/religion-detail');
});

Route::get('/staff-bank', function () {
    return view('front-end/profile/company/staff/profile-dashboard/bank-detail');
});

Route::get('/staff-passport', function () {
    return view('front-end/profile/company/staff/profile-dashboard/passport-detail');
});

Route::get('/staff-emergency', function () {
    return view('front-end/profile/company/staff/profile-dashboard/emergency-detail');
});



// User Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('voyager.logout');
});

Route::get('unauthorized',[\App\Http\Controllers\FrontEnd\HomeController::class,'unauthorized']);


