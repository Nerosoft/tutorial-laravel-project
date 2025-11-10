<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mydb;
class LoginController extends LoginRegister implements ViewLanguage
{
    function setupViewLang(){
        $this->myView = view('login',[
            'lang'=>$this,
            'action'=>route('makeLogin')
        ]);
    }
    function __construct(){
        $this->ob = mydb::find(request()->route('id'))?mydb::find(request()->route('id')):(mydb::find(request()->input('userAdmin'))?mydb::find(request()->input('userAdmin')):mydb::first());
        parent::__construct(isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))]) ? unserialize(request()->cookie($this->getDb()['_id'])) : $this->getDb()['Setting']['Language'], $this, 'Login');
    }
    function getDb(){
        return $this->ob;
    }
    function MyInfo(){
        return $this->ob[$this->language];
    }
    function index(){
        return $this->myView;
    }
    function makeValidation(){
        $this->errorMessage = $this->MyInfo()['Login']['UserPasswordDntMatch'];
        request()->validate($this->roll, $this->message);
    }

    function makeLogin(){
        if(!empty($this->users))
            foreach ($this->users as $key => $user)
                if($user['Email'] === request()->input('email') && $user['Password'] === request()->input('password')){
                    request()->session()->put('userId', request()->input('userAdmin'));
                    request()->session()->put('superId', request()->input('userAdmin'));
                    return redirect()->route('Home')->with('success', $this->successfully);
                }         
        // return error email exsist
        return back()->withInput()->withErrors($this->errorMessage);
    }
}
