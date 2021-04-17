<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Company\DepartmentController;
use App\Http\Controllers\Company\StaffController;
use App\Http\Controllers\Survey\SurveyController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Survey\AdminSurveyController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/admin', [UserController::class, 'login'])->name('login');
Route::post('/admin', [UserController::class, 'postLogin'])->name('postlogin');
Route::get('/', [UserController::class, 'loginCompany'])->name('loginCompany');
Route::post('/company', [UserController::class, 'postloginCompany'])->name('postloginCompany');
Route::get('/dashboard', [CompanyController::class, 'dashboardCompany'])->name('dashboardCompany');
Route::get('/register', [CompanyController::class, 'registerUser'])->name('registerUser');
Route::post('/register', [CompanyController::class, 'postRegisterUser'])->name('postRegisterUser');

Route::prefix('admin')->group(function (){
    Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::prefix('dashboard')->group(function (){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::prefix('users')->group(function (){
        Route::get('/add', [UserController::class, 'registerUserView'])->name('registerUserView');
        Route::post('/add', [UserController::class, 'postRegisterUser'])->name('postUserAdmin');
        Route::get('/', [UserController::class, 'getListUser'])->name('listUser');
        Route::get('/edit/{id}',[UserController::class, 'editUserView'])->name('editUser');
        Route::post('/edit',[UserController::class, 'updateUser'])->name('updateUser');
        Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
    });
    Route::prefix('companies')->group(function (){
        Route::get('/add', [UserController::class, 'createUserCompanyView'])->name('createUserCompanyView');
        Route::post('/add', [UserController::class, 'postCreateUserCompany'])->name('postCreateUserCompany');
        Route::get('/', [UserController::class, 'getUserCompany'])->name('getUserCompany');
        Route::get('/edit/{id}',[UserController::class, 'getEditUserCompany'])->name('getEditUserCompany');
        Route::post('/edit',[UserController::class, 'updateUserCompany'])->name('updateUserCompany');
        Route::get('/delete/{id}', [UserController::class, 'deleteUserCompany'])->name('deleteUserCompany');
    });

    Route::prefix('survey')->group(function (){
        Route::get('/add', [AdminSurveyController::class, 'addSurvey'])->name('Admin.addSurvey');
        Route::post('/add', [AdminSurveyController::class, 'postAddSurvey'])->name('Admin.postAddSurvey');
        Route::get('/', [AdminSurveyController::class, 'listSurveyAdmin'])->name('Admin.listSurveyCompany');
        Route::post('/detail', [AdminSurveyController::class, 'getDetailSurvey'])->name('Admin.detailSurveyCompany');
        Route::post('/quiz/detail', [AdminSurveyController::class, 'getdetailQuiz'])->name('Admin.getdetailQuiz');
        Route::post('/quiz/update', [AdminSurveyController::class, 'updateQuiz'])->name('Admin.updateQuiz');
        Route::post('/status', [AdminSurveyController::class, 'updateStatusSurvey'])->name('Admin.updateStatusSurvey');
    });


});

Route::middleware('verifiedLoginUser')->prefix('/')->group(function (){
    Route::get('/logout', [UserController::class, 'logoutCompany'])->name('company.logout');
    Route::prefix('users')->group(function (){
          Route::get('/add', [StaffController::class, 'index'])->name('indexStaff');
          Route::post('/add', [StaffController::class, 'postStaff'])->name('postStaff');
          Route::get('/', [StaffController::class, 'listStaff'])->name('listStaff');
          Route::get('/edit/{id}',[StaffController::class, 'editStaffUser'])->name('editStaffUser');
          Route::post('/edit',[StaffController::class, 'postEditStaffUser'])->name('postEditStaffUser');
          Route::get('/delete/{id}', [StaffController::class, 'deleteUserStaff'])->name('deleteUserStaff');
          Route::post('/delete', [StaffController::class, 'deleteAllUserStaff'])->name('deleteAllUserStaff');
          Route::post('/ajax/fillter',[StaffController::class, 'ajaxFillterUserStaff'])->name('ajaxFillterUserStaff');
    });
    Route::prefix('departments')->group(function (){
          Route::get('/', [DepartmentController::class, 'index'])->name('departmentsview');
          Route::post('/add', [DepartmentController::class, 'postDepartment'])->name('postdepartments');
//        Route::get('/', [UserController::class, 'getListUser'])->name('listUser');
          Route::get('/edit/{id}',[DepartmentController::class, 'detailDepartment'])->name('detailDepartment');
          Route::post('/edit',[DepartmentController::class, 'postDetailDepartment'])->name('postDetailDepartment');
           Route::get('/delete/{id}', [DepartmentController::class, 'deleteDepartment'])->name('deleteDepartment');
         Route::post('/delete', [DepartmentController::class, 'deleteAllDepartment'])->name('deleteAllDepartment');
    });

    Route::prefix('survey')->group(function (){
        Route::get('/add', [SurveyController::class, 'addSurvey'])->name('addSurvey');
        Route::post('/add', [SurveyController::class, 'postAddSurvey'])->name('postAddSurvey');
        Route::get('/', [SurveyController::class, 'listSurveyCompany'])->name('listSurveyCompany');
        Route::post('/detail', [SurveyController::class, 'getDetailSurvey'])->name('detailSurveyCompany');
        Route::post('/update', [SurveyController::class, 'updateSurvey'])->name('updateSurvey');
        Route::post('/quiz/detail', [SurveyController::class, 'getdetailQuiz'])->name('getdetailQuiz');
        Route::post('/quiz/update', [SurveyController::class, 'updateQuiz'])->name('updateQuiz');
        Route::post('/status', [SurveyController::class, 'updateStatusSurvey'])->name('updateStatusSurvey');
        Route::post('/ajax/changedate', [SurveyController::class, 'ajaxChangeDateSurvey'])->name('ajaxChangeDateSurvey');
        Route::post('/delete',[SurveyController::class, 'deleteSurvey'])->name('deleteSurvey');
        Route::get('/template', [SurveyController::class, 'surveyTemplate'])->name('surveyTemplate');
        Route::post('/detail/template',[SurveyController::class, 'getDetailSurveyTemplate'])->name('getDetailSurveyTemplate');
        Route::post('/convert',[SurveyController::class, 'convertSurveyAdminToCompany'])->name('convertSurveyAdminToCompany');
    });


});
