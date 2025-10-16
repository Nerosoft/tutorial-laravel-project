<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ActionControllers\MainBranchController;
use App\Http\Controllers\ActionControllers\DeleteLangController;
use App\Http\Controllers\ActionControllers\AdminChangeLangController;
use App\Http\Controllers\ActionControllers\AuthChangeLangController;
use App\Http\Controllers\ActionControllers\DeleteCustomTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomFlexTableController;
use App\Http\Controllers\SystemLangController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\TestCulturesController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\DeleteController;
use App\Models\mydb;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\FlexTableController;
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
Route::controller(MainBranchController::class)->group(function (){
    Route::post('/branchMain', 'makeChangeBranch')->name('branchMain')->middleware(IsLogin::class.':admin');
});
Route::controller(DeleteLangController::class)->group(function (){
    Route::post('/deleteLanguage', 'makeDeleteMyLanguage')->name('language.delete')->middleware(IsLogin::class.':admin');
});
Route::controller(AdminChangeLangController::class)->group(function (){
    Route::post('/changeLanguage', 'makeChangeMyLanguage')->name('language.change')->middleware(IsLogin::class.':admin');
});
Route::controller(AuthChangeLangController::class)->group(function (){
    Route::post('/makeChangeLanguage','makeChangeLanguage')->name('makeChangeLanguage')->middleware(Auth::class.':admin');
});
Route::controller(DeleteCustomTableController::class)->group(function (){
    Route::post('/deleteTable', 'makeDeleteTable')->name('deleteTable')->middleware(IsLogin::class.':admin');
});
Route::controller(HomeController::class)->group(function (){
    Route::get('/home','index')->name('Home')->middleware(IsLogin::class.':admin');
});
Route::controller(SystemLangController::class)->group(function () {
    Route::get('/system/language/{lang?}/{id?}', 'index')->name('SystemLang')->middleware(IsLogin::class.':admin');
    Route::post('/edit/{lang}/{id}/{name}/{item?}', 'makeEditLanguage')->name('edit.editAllLanguage')->middleware(IsLogin::class.':admin');
});
Route::controller(LangController::class)->group(function () {
    Route::get('/ChangeLanguage', 'index')->name('ChangeLanguage')->middleware(IsLogin::class.':admin');
    Route::post('/newLanguage', 'makeAddEditLanguage')->name('lang.createLanguage')->middleware(IsLogin::class.':admin');
    Route::post('/copyLanguage', 'makeAddEditLanguage')->name('language.copy')->middleware(IsLogin::class.':admin');
});
Route::controller(TestCulturesController::class)->group(function () {
    Route::get('/testCultures/{id?}', 'index')->name('TestCultures')->middleware(IsLogin::class.':test');
    Route::post('/createTest/{id?}', 'makeAddEditTest')->name('createTest')->middleware(IsLogin::class.':test');
    Route::post('/editTest/{id?}', 'makeAddEditTest')->name('editTest')->middleware(IsLogin::class.':test');
});
Route::controller(FlexTableController::class)->group(function () {
    Route::get('/flextable/{id?}', 'index')->name('FlexTable')->middleware(IsLogin::class.':test');
    Route::post('/createFlexTable/{id?}', 'makeAddEditFlexTable')->name('createFlexTable')->middleware(IsLogin::class.':test');
    Route::post('/editFlexTable/{id?}', 'makeAddEditFlexTable')->name('editFlexTable')->middleware(IsLogin::class.':test');
});
Route::controller(BranchesController::class)->group(function () {
    Route::get('/branches', 'index')->name('Branches')->middleware(IsLogin::class.':admin');
    Route::post('/addBranchRays', 'makeAddBranch')->name('addBranchRays')->middleware(IsLogin::class.':admin');
    Route::post('/editBranchRays', 'makeEditBranch')->name('editBranchRays')->middleware(IsLogin::class.':admin');
});
Route::controller(CustomFlexTableController::class)->group(function () {
    Route::get('/custom_table', 'index')->name('CustomTable')->middleware(IsLogin::class.':admin');
    Route::post('/addTable', 'makeAddEditTable')->name('addTable')->middleware(IsLogin::class.':admin');
    Route::post('/editTable', 'makeAddEditTable')->name('editTable')->middleware(IsLogin::class.':admin');
});
Route::controller(DeleteController::class)->group(function () {
    Route::post('/deleteItem/{id?}', 'action')->name('deleteItem')->middleware(IsLogin::class.':test');
    Route::post('/deleteItembranch/{id?}', 'action2')->name('branch.delete')->middleware(IsLogin::class.':test');
});
Route::controller(LogoutController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout')->middleware(IsLogin::class.':admin');
});

