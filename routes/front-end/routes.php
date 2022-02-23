<?php
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';



//contact person
//Route::resource('contact-person',[])
      Route::resource('contact-person',\App\Http\Controllers\ContactPerson\ContactPersonController::class);
    // Job Post Routes
    Route::resource('jobs',\App\Http\Controllers\FrontEnd\Job\JobController::class)->middleware('company');

    // Documents Routes
    Route::resource('document',\App\Http\Controllers\Document\UserDocumentController::class);

//========================================= Staff Routes =====================================
Route::group(['prefix' => 'staff','middleware'=>'staff'], function () {

    //create
    Route::get('/store/religion',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createReligion']);
    $routeExpression = 'religion|bank|passport|emergency';
    Route::get('/create/{type}',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createBasicDetails'])->where('type',$routeExpression);
    Route::get('/store/{type}',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'storeBasicDetails'])->where('type',$routeExpression);
//    Route::get('/create/bank',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createBank']);
//    Route::get('/create/passport',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createPassport']);
//    Route::get('/create/emergency',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createEmergency']);

    //dashboard - profile
    Route::get('/',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'index']);
    Route::get('dashboard',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'staff'])->name('staff.dashboard');
    Route::get('dashboard/basic',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'staffBasic']);

});
//======================================== End ============================================

//========================================= Company Routes =====================================
Route::group(['prefix' => 'company','middleware'=>'company'], function () {

    // site routes
    Route::get('sites/create',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'create']);
    Route::post('sites/store',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'store']);
    Route::get('sites/show',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'show']);

    // company confidential
    Route::get('/confidential/create',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'createConfidential'])->name('confidential.create');
    Route::post('/confidential/update/{id}',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'updateConfidential'])->name('confidential.update');

    // Company profile Picture
    Route::post('/change/profile/picture',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'updatePicture'])->name('company.picture.update');

    // company routes
    Route::post('/update/{company}',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'update'])->name('company.update');
    Route::get('/',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'index']);
    Route::get('/edit/{id}',[\App\Http\Controllers\FrontEnd\Profile\CompanyProfileController::class,'edit'])->name('company.edit');
    Route::get('dashboard',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'company'])->name('company.dashboard');



});




