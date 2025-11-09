<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
class RegisterController extends LoginRegister implements MyInfo
{
    function setupViewLang(){
        $this->labelUserRepeatPassword = $this->MyInfo()['LabelUserRepeatPassword'];
        $this->labelUserCodePassword = $this->MyInfo()['LabelUserCodePassword'];
        $this->hintUserRepeatPassword = $this->MyInfo()['HintUserRepeatPassword'];
        $this->hintUserCodePassword = $this->MyInfo()['HintUserCodePassword'];
        $this->myView = view('register',[
            'lang'=>$this,
            'action'=>route('makeRegister')
        ]);
    }
    function __construct(){
        $this->ob = mydb::find(request()->route('id'))?mydb::find(request()->route('id')):(mydb::find(request()->input('userAdmin'))?mydb::find(request()->input('userAdmin')):mydb::first());
        $this->UserRepeatPassword = $this->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']]['Register']['UserRepeatPassword'];
        $this->UserRepeatPasswordRequired = $this->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']]['Register']['UserRepeatPasswordRequired'];
        $this->error7 = $this->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']]['Register']['UserPasswordDntMatch'];
        $this->error8 = $this->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']]['Register']['UserCodePasswordRequired'];
        $this->error9 = $this->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']]['Register']['UserCodePassword'];
        parent::__construct($this, isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))]) ? unserialize(request()->cookie($this->getDb()['_id'])) : $this->getDb()['Setting']['Language']);
    }
    function index(){
        return $this->myView;
    }
    function makeRegister(){
        $this->getDb()->save();
        request()->session()->put('userId', request()->input('userAdmin'));
        request()->session()->put('superId', request()->input('userAdmin'));
        return redirect()->route('Home')->with('success',  $this->successfully);
    }
    function getDb(){
        return $this->ob;
    }
    function MyInfo($key = 'Register'){
        return $this->ob[$this->language][$key];
    }
    function makeValidation(){
        array_push($this->roll['email'], Rule::notIn(array_values(array_map(function($users) {return $users['Email'];}, $this->users))));
        $this->users[$this->generateUniqueIdentifier()] = array('Key'=>request()->input('codePassword'), 'Password'=>request()->input('password'), 'Email'=>request()->input('email'));
        $this->getDb()['User'] = $this->users;
        array_push($this->roll['password'], 'confirmed');
        $this->roll['password_confirmation'] = ['required', 'min:8'];
        $this->roll['codePassword'] = ['required', 'min:8'];
        $this->message['email.not_in'] = $this->MyInfo()['UserEmailExist'];
        $this->message['password_confirmation.min'] = $this->UserRepeatPassword;
        $this->message['password_confirmation.required'] = $this->UserRepeatPasswordRequired;
        $this->message['codePassword.min'] = $this->error9;
        $this->message['codePassword.required'] = $this->error8;
        $this->message['password.confirmed']= $this->error7;
        request()->validate($this->roll, $this->message);
    }
}
