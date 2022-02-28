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

    Route::resource('certification',\App\Http\Controllers\Frontend\Profile\StaffCertificationController::class);

    Route::resource('official-training',\App\Http\Controllers\Frontend\Profile\StaffOfficialTrainingController::class);

    Route::resource('employment-history',\App\Http\Controllers\Frontend\Profile\StaffEmploymentHistoryController::class);
    Route::get('employment-history/{employment_history}/view',[\App\Http\Controllers\Frontend\Profile\StaffEmploymentHistoryController::class,'view'])->name("employment_history.view");

    Route::resource('personal-reference',\App\Http\Controllers\Frontend\Profile\StaffPersonalReferenceController::class);
    Route::get('personal-reference/{personal_reference}/view',[\App\Http\Controllers\Frontend\Profile\StaffPersonalReferenceController::class,'view'])->name("personal_reference.view");

    Route::post('job/apply',[\App\Http\Controllers\FrontEnd\Job\JobController::class,'jobApply']);


    //create
    Route::get('/store/religion',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createReligion']);
    $routeExpression = 'religion|bank|passport|basic|confidential';
    Route::get('/{urlType}/create',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'createBasicDetails'])->where('urlType',$routeExpression);
    Route::post('/{urlType}/store',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'storeBasicDetails'])->where('urlType',$routeExpression);

    //dashboard - profile
    Route::get('/',[\App\Http\Controllers\FrontEnd\Profile\StaffProfileController::class,'index']);
    Route::get('dashboard',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'staff'])->name('staff.dashboard');
    Route::get('dashboard/basic',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'staffBasic']);
    Route::get('dashboard/qualification',[\App\Http\Controllers\FrontEnd\Dashboard\DashboardController::class,'staffQualification']);

});
//======================================== End ============================================

//========================================= Company Routes =====================================
Route::group(['prefix' => 'company','middleware'=>'company'], function () {

    // site routes
    Route::resource('sites',\App\Http\Controllers\FrontEnd\Site\SiteController::class);
    Route::get('job/{jobId}/applications',[\App\Http\Controllers\FrontEnd\Job\JobController::class,'jobApplications']);
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




