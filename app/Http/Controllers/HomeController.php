<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;

class HomeController extends AdminMenu implements MyDatabase
{
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        parent::__construct($this, 'Admin');
    }
    function getDb(){
        return $this->ob;
    }
    function index(){
        return view('home',[
            'lang'=> $this,
            'active'=>'Home',
        ]);
    }
}
