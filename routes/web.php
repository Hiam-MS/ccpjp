<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExpController;
use App\Http\Controllers\PAddController;
use App\Http\Controllers\CityController;

use Illuminate\Routing\Redirector;
use Jenssegers\Agent\Agent;


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



Route::get('/', function () {
    return view('index');
});




// Route::get('/','CompanyController@index')->name('index');
Route::get('/JobCategory','JobCategoryController@showJobJobCategory');
Auth::routes();
   
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//     list jobs and job details
Route::get('/job/details/{id}','JobsController@JobDetails')->name('JobDetails');
Route::get('/job/showJobs','JobsController@showJob')->name('job');
Route::get('job/records','JobsController@records')->name('job/records');
// Route::get('view_resuem','PersonController@viewResuemForm')->name('resuems');

Route::get('students/records','PersonController@records')->name('students/records');


Route::group(['middleware' => 'prevent-back-history'],function(){
    
    Auth::routes();


//    *******************   auth  *****************

Route::group(['middleware' => 'auth'], function(){
    Route::get('/change-password','Auth\ChangePasswordController@index')->name('password.change'); 
    Route::post('/update-password','Auth\ChangePasswordController@ChangePassword')->name('password.update'); 

    Route::get('/edit-profile','UserController@editform')->name('edit.form'); 
    Route::post('/update-profile','UserController@updateprofile')->name('profile.update');

    Route::get('/edit-profile-email','UserController@editformEmail')->name('edit.formEmail'); 
    Route::post('','UserController@updateprofileEmail')->name('profile.updateEmail');

    Route::get('/delete-profile', 'UserController@Deleteprofile')->name('profile.delete');

    // ********************* role company *******************
   

    Route::group(['middleware' => 'role:company'], function(){

    Route::get('/company/dashboard','CompanyController@getDash')->name('CompanyDash');
    Route::get('/company/profile','CompanyController@createProfile')->name('CompanyProfile');
    Route::post('/company/storeProfile','CompanyController@storeProfile')->name('CompanyStoreProfile');
    Route::get('/company/viewProfile','CompanyController@viewProfile')->name('CompanyViewProfile');
    Route::get('/company/editProfile','CompanyController@editCompanyProfile')->name('CompanyEditProfile');
    Route::PUT('/company/editProfile','CompanyController@updatCompanyProfile')->name('edititing');
    Route::PUT('/company/editProfile2','CompanyController@updatCompanyProfile2')->name('edititing2');
    Route::get('company/shortList','CompanyController@getJob')->name('CompanyJob');

    Route::get('company/endJobs','CompanyController@endJobs')->name('CompanyEndJobs');
    Route::post('/company/update_EndJob/{id}', 'CompanyController@update_JobEnd')->name('update_JobEnd');
    Route::get('company/additionalInfo','CompanyController@addCompanyInfo')->name('CompanyAdditionalInfo');
    Route::post('company/storeAdditionalInfo/{id}','CompanyController@storeAdditionalInfo')->name('StoreAdditionlInfo');

    //********************************************* */

    Route::get('/job/addJob','JobsController@addJob')->name('addJob');
    Route::post('/job/storeJob','JobsController@storeJob')->name('storeJob');
    });


    // ********************* role company + admin *******************

    Route::group(['middleware' => 'role:company|admin'], function(){
    // view all resume and resume details

    Route::get('Person/details/{id}','PersonController@ResuemDetails')->name('personDetail'); 
    Route::get('view_resuem','PersonController@viewResuemForm')->name('resuems');
    Route::post('/resume/search','PersonController@searchResume')->name('search.Resume');
    // Route::get('view_resuem','CompanyController@showPeople')->name('resuems');

    //
    });


 //******************   role  person     ************

    Route::group(['middleware' => 'role:persone'], function(){
     

    Route::get('/resume/dashboard','PersonController@index')->name('PersonDash');

    // CV preview
    Route::get('/resume/ViewpersonalInfo','PersonController@ViewpersonalInfo')->name('PersonProfile');
    //
    //show form (add personal info)
    Route::get('/resume/create','PersonController@createResume')->name('resuem.create');
    Route::post('/resume/store','PersonController@store');
    Route::get('/resume/edit-Personal-Info', 'PersonController@editPersonalInfo')->name('PersonalInfo.edit');
    Route::PUT('/resume/update-Personal-Info','PersonController@updatPersonalInfo')->name('PersonUpdateInfo');
    Route::PUT('/resume/update-Personal-add','PersonController@updatPersonalInfo2')->name('PersonUpdateInfo2');

    //show form for add Edu _ Exp _ skill
    Route::get('/resume/createEdu','PersonController@createResumeEdu')->name('edu');
    //Education
    Route::get('/resume/addEducation/{id}','PersonController@createPersonEdu');
    Route::post('/resume/storePersonEdu','PersonController@storePersonEdu')->name('PersonStoreEdu');
    Route::get('/resume/deleteEdu/{id}', 'PersonController@DeletePersonEdu');
    Route::get('/resume/editEdu/{cid}', 'PersonController@editPersonEdu');
    Route::PUT('/resume/updateEdu','PersonController@updateEdu')->name('PersonUpdateEdu');

    //Experience
    Route::get('/resume/addExperience/{id}','ExpController@createPersonExp');
    Route::post('/resume/storePersonExp','ExpController@storePersonExp')->name('PersonStoreExp');
    Route::get('/resume/deleteExperience/{id}', 'ExpController@DeletePersonExperience');
    Route::get('/resume/editExperience/{cid}', 'ExpController@editPersonExperience');
    Route::PUT('/resume/updatExperience','ExpController@updateExperience')->name('PersonUpdateExp');


    //skill//
    Route::get('/resume/addSkill/{id}','SkillController@createPersonSkill');
    Route::post('/resume/storePersonSkill','SkillController@storePersonSkill')->name('PersonStoreSkill');
    Route::get('/resume/deleteSkill/{id}', 'SkillController@DeletePersonSkill');
    Route::get('/resume/editSkill/{cid}', 'SkillController@editPersonSkill');
    Route::PUT('/resume/updateSkill','SkillController@updateSkill')->name('PersonUpdateSkill');


    //Course //
    Route::get('/resume/addCourse/{id}','CourseController@createPersonCourse');
    Route::post('/resume/storePersonCourse','CourseController@storePersonCourse')->name('PersonStoreCourse');
    Route::get('/resume/deleteCourse/{id}', 'CourseController@DeletePersonCourse');
    Route::get('/resume/editCourse/{cid}', 'CourseController@editPersonCourse');
    Route::PUT('/resume/updateCourse','CourseController@updateCourse')->name('PersonUpdateCourse');

    //PAdditional
    Route::post('/resuem/additional','PAddController@storeAdditionalInfo')->name('StoreAdditional');


    Route::post('/resume/storePersonJobCat','PersonController@storePersonJobCat')->name('PersonJobCategory');

    Route::get('/resume/deleteCat/{id}', 'PersonController@DeletePersonCat');
    });

    /**************Admin******************** */
    Route::group(['middleware' => 'role:admin'], function(){
        Route::get('/company/show','AdminController@showCompany')->name('showCompany');
        Route::get('/company/detail/{id}','AdminController@showCompanyDetail')->name('showCompanyDetail');
        Route::post('/company/update/{id}','AdminController@updateCompanyDetail')->name('updateCompanyDetail');

        Route::get('/people/detail/{id}','AdminController@showPeopleDetail')->name('showPeopleDetail');
        // Route::get('/country','AdminController@addCountry');
        // Route::get('/city/{id}','AdminController@addCity');
        Route::get('/admin/dashboard','AdminController@getDash')->name('admin.Dash');
        Route::get('/admin/pending_jobs','AdminController@pendingJob')->name('pendingJob');
        Route::post('/job/accepte_Job/{id}', 'AdminController@accepte_JobStatuse')->name('accepte_JobStatuse');
        Route::post('/job/denie_Job/{id}', 'AdminController@denied_JobStatuse')->name('denied_JobStatuse');
        Route::post('/company/ban/{id}', 'AdminController@BanCompany')->name('BanComany');
        Route::post('/company/unban/{id}', 'AdminController@unBanCompany')->name('unBanCompany');
        Route::get('/people/show','AdminController@showPeople')->name('people');
        Route::post('/people/ban/{id}', 'AdminController@BanPeople')->name('BanPeople');
        Route::post('/people/unban/{id}', 'AdminController@unBanPeople')->name('unBanPeople');


        Route::get('/jobs/show','AdminController@showJobs')->name('jobs');
        //___________________Cities Routes_________________________________
        Route::get('/city/show', [CityController::class, 'showCitites'])->name('cities');
        Route::get('/city/{id}/edit', [CityController::class, 'editCitites']);
    });


});

});


Route::get('/resume/applyedJob','ApplicantController@applyedJob')->name('ApplyedJob');

Route::post('/job/application/{id}/store', 'ApplicantController@storeApplyedJob');

Route::get('/job/applyedToJob/{id}','ApplicantController@getApplyedToJob')->name('Applicants');

Route::get('/job/applyedToJob/{id}/{user}/hire', 'ApplicantController@hire');

Route::get('/job/applyedToJob/{id}/{user}/reject', 'ApplicantController@reject');


Route::get('/job/applicationForm/{id}','ApplicantController@getApplicationForm');

//Route::get('res_det','PersonController@res_det');
// //auth _ register _ login
// Route::get('auth/login','HomeController@login');
// Route::get('auth/register','HomeController@register');

// Route::get('/select2', function () {
//     return view('person.testselect2');
// });