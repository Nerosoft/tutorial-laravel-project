<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\SystemLangController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TestCulturesController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\KnowController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\DeleteController;

use App\Models\mydb;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\IsLogin;
use App\Http\Middleware\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginController::class)->group(function (){
    Route::get('/login/{id?}','index')->middleware(Auth::class.':admin');
    Route::post('/makeLogin','makeLogin')->name('makeLogin')->middleware(Auth::class.':admin');
});
Route::controller(RegisterController::class)->group(function (){
    Route::get('/register/{id?}','index')->middleware(Auth::class.':admin');
    Route::post('/makeRegister','makeRegister')->name('makeRegister')->middleware(Auth::class.':admin');
});
Route::controller(MyController::class)->group(function (){
    Route::post('/branchMain', 'makeChangeBranch')->name('branchMain')->middleware(IsLogin::class.':admin');
    Route::post('/makeChangeLanguage','makeChangeLanguage')->name('makeChangeLanguage')->middleware(Auth::class.':admin');
    Route::post('/changeLanguage', 'makeChangeMyLanguage')->name('language.change')->middleware(IsLogin::class.':admin');
    Route::post('/deleteLanguage', 'makeDeleteMyLanguage')->name('language.delete')->middleware(IsLogin::class.':admin');
    Route::post('/deleteBranch', 'makeDeleteMyBranch')->name('branch.delete')->middleware(IsLogin::class.':admin');

});

Route::controller(HomeController::class)->group(function (){
    Route::get('/home','index')->name('Home')->middleware(IsLogin::class.':admin');
});




Route::controller(SystemLangController::class)->group(function () {
    Route::get('/system/language/{lang?}/{id?}', 'index')->name('SystemLang')->middleware(IsLogin::class.':admin');
    Route::post('/edit/{lang?}/{id?}/{name?}/{item?}', 'makeEditLanguage')->name('edit.editAllLanguage')->middleware(IsLogin::class.':admin');
});
Route::controller(LangController::class)->group(function () {
    Route::get('/ChangeLanguage', 'index')->name('ChangeLanguage')->middleware(IsLogin::class.':admin');
    Route::post('/newLanguage', 'makeAddLanguage')->name('lang.createLanguage')->middleware(IsLogin::class.':admin');
    Route::post('/copyLanguage', 'makeCopyLanguage')->name('language.copy')->middleware(IsLogin::class.':admin');
});
Route::controller(ReceptionController::class)->group(function () {
    Route::get('/reception', 'index')->name('Receipt')->middleware(IsLogin::class.':admin');
    Route::post('/createPatientServices', 'makeAddReceipt')->name('createPatientServices')->middleware(IsLogin::class.':admin');
    Route::post('/editPatientServices', 'makeEditReceipt')->name('editPatientServices')->middleware(IsLogin::class.':admin');
});
Route::controller(PatientController::class)->group(function () {
    Route::get('/patent', 'index')->name('Patent')->middleware(IsLogin::class.':admin');
    Route::post('/createPatent', 'makeAddPatent')->name('createPatent')->middleware(IsLogin::class.':admin');
    Route::post('/editPatent', 'makeEditPatent')->name('editPatent')->middleware(IsLogin::class.':admin');
});
Route::controller(TestCulturesController::class)->group(function () {
    Route::get('/testCultures/{id?}', 'index')->name('TestCultures')->middleware(IsLogin::class.':test');
    Route::post('/createTest/{id?}', 'makeAddTest')->name('createTest')->middleware(IsLogin::class.':test');
    Route::post('/editTest/{id?}', 'makeEditTest')->name('editTest')->middleware(IsLogin::class.':test');
});
Route::controller(ContractsController::class)->group(function () {
    Route::get('/mycontracts', 'index')->name('Contracts')->middleware(IsLogin::class.':admin');
    Route::post('/createContract', 'makeAddContracts')->name('createContract')->middleware(IsLogin::class.':admin');
    Route::post('/editContract', 'makeEditContracts')->name('editContract')->middleware(IsLogin::class.':admin');
});
Route::controller(KnowController::class)->group(function () {
    Route::get('/myknow', 'index')->name('Knows')->middleware(IsLogin::class.':admin');
    Route::post('/createKnows', 'makeAddKnow')->name('createKnows')->middleware(IsLogin::class.':admin');
    Route::post('/editKnows', 'makeEditKnow')->name('editKnows')->middleware(IsLogin::class.':admin');
});
Route::controller(BranchesController::class)->group(function () {
    Route::get('/branches', 'index')->name('Branches')->middleware(IsLogin::class.':admin');
    Route::post('/addBranchRays', 'makeAddBranch')->name('addBranchRays')->middleware(IsLogin::class.':admin');
    Route::post('/editBranchRays', 'makeEditBranch')->name('editBranchRays')->middleware(IsLogin::class.':admin');
});
Route::controller(DeleteController::class)->group(function () {
    Route::post('/deleteItem/{id?}', 'action')->name('deleteItem')->middleware(IsLogin::class.':delete');
});





Route::controller(LogoutController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout')->middleware(IsLogin::class.':admin');
});
Route::get('/', function () {
    return view('welcome');
});

