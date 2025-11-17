<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\mydb;

class LogoutController extends Controller
{
    function logout(){
        $url = mydb::first()['_id'] === request()->session()->get('superId') ? redirect()->route('mylogin') : redirect('/login/'.request()->session()->get('superId'));
        request()->session()->forget('superId');
        request()->session()->forget('userId');
        return $url;
    }
}
