<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\HomeController;
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
    Route::post('/makeChangeLanguage','makeChangeLanguage')->name('makeChangeLanguage')->middleware(Auth::class.':admin');
});
Route::controller(HomeController::class)->group(function (){
    Route::get('/home','index')->name('home')->middleware(IsLogin::class.':admin');
});
Route::controller(LogoutController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout')->middleware(IsLogin::class.':admin');
});
Route::get('/', function () {
    return view('welcome');
});

