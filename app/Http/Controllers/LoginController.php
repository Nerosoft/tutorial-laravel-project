<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mydb;
class LoginController extends LoginRegister implements ViewLanguage
{
    function setupViewLang(){
        $this->myView = view('Login',[
            'lang'=>$this
        ]);
    }
    function __construct(){
        $this->ob = mydb::find(request()->route('id'))?mydb::find(request()->route('id')):
        (mydb::find(request()->input('id'))?mydb::find(request()->input('id')):mydb::first());
        parent::__construct('Login', $this);
    }
    function getDb(){
        return $this->ob;
    }
    function index(){
        return $this->myView;
    }
    function makeValidation(){
        $this->errorMessage = $this->ob[$this->language]['Login']['UserPasswordDntMatch'];
        request()->validate($this->roll, $this->message);
    }

    function makeLogin(){
        foreach ($this->users as $key => $user)
            if($user['Email'] === request()->input('email') && $user['Password'] === request()->input('password')){
                request()->session()->put('userId', request()->input('id'));
                request()->session()->put('superId', request()->input('id'));
                return redirect()->route('Home')->with('success', $this->successfully);
            }         
        // return error email exsist
        return back()->withInput()->withErrors($this->errorMessage);
    }
}
