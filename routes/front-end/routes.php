<?php
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

//========================================= Company Routes =====================================
Route::group(['prefix' => 'company'], function () {

    Route::get('/',[\App\Http\Controllers\FrontEnd\Profile\Company\CompanyController::class,'index']);
    Route::get('dashboard',[\App\Http\Controllers\FrontEnd\Profile\Company\CompanyController::class,'dashboard'])->name('company.dashboard');
});


