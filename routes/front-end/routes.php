<?php
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';



//contact person
//Route::resource('contact-person',[])

//========================================= Company Routes =====================================
Route::group(['prefix' => 'company'], function () {

    // site routes
    Route::get('sites/create',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'create']);
    Route::post('sites/store',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'store']);

    // company confidential
    Route::get('/confidential/create',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'createConfidential'])->name('confidential.create');
    Route::post('/confidential/update/{id}',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'updateConfidential'])->name('confidential.update');

    // company routes
    Route::post('/update/{company}',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'update'])->name('company.update');
    Route::get('/',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'index']);
    Route::get('/edit/{id}',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'edit'])->name('company.edit');
    Route::get('dashboard',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'company'])->name('company.dashboard');

});




