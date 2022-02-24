<?php
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';



//contact person
//Route::resource('contact-person',[])
      Route::resource('contact-person',\App\Http\Controllers\ContactPerson\ContactPersonController::class);
      Route::get('contact-person/{contact_person}/view',[\App\Http\Controllers\ContactPerson\ContactPersonController::class,'view'])->name("contact-person.view");
    // Job Post Routes
    Route::resource('jobs',\App\Http\Controllers\FrontEnd\Job\JobController::class)->middleware('company');

    // Documents Routes
    Route::resource('document',\App\Http\Controllers\Document\UserDocumentController::class);

//========================================= Staff Routes =====================================
Route::group(['prefix' => 'staff','middleware'=>'staff'], function () {

    Route::resource('education',\App\Http\Controllers\Frontend\Profile\StaffEducationController::class);

    //create
    Route::get('/store/religion',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createReligion']);
    $routeExpression = 'religion|bank|passport|basic|confidential';
    Route::get('/{urlType}/create',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createBasicDetails'])->where('urlType',$routeExpression);
    Route::post('/{urlType}/store',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'storeBasicDetails'])->where('urlType',$routeExpression);

    //dashboard - profile
    Route::get('/',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'index']);
    Route::get('dashboard',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'staff'])->name('staff.dashboard');
    Route::get('dashboard/basic',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'staffBasic']);

});
//======================================== End ============================================

//========================================= Company Routes =====================================
Route::group(['prefix' => 'company','middleware'=>'company'], function () {

    // site routes
    Route::resource('sites',\App\Http\Controllers\FrontEnd\Site\SiteController::class);
    // site routes
//    Route::get('sites/create',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'create']);
//    Route::post('sites/store',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'store']);
//    Route::get('sites/show',[\App\Http\Controllers\FrontEnd\Site\SiteController::class,'show']);

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




