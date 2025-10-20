<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;
class LoginRegister extends SettingPage
{
    function __construct($state, ViewLanguage $obj){
        $this->errorUserEmail = $obj->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']][$state]['UserEmail'];
        $this->errorUserEmailRequired = $obj->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']][$state]['UserEmailRequired'];
        $this->errorUserPassword = $obj->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']][$state]['UserPassword'];
        $this->errorUserPasswordRequired = $obj->getDb()[isset($this->getDb()[@unserialize(request()->cookie($this->getDb()['_id']))])?unserialize(request()->cookie($this->getDb()['_id'])):$this->getDb()['Setting']['Language']][$state]['UserPasswordRequired'];
        if(Route::currentRouteName() === 'makeLogin' || Route::currentRouteName() === 'makeRegister'){
            parent::__construct(isset($obj->getDb()[@unserialize(request()->cookie($obj->getDb()['_id']))]) ? unserialize(request()->cookie($obj->getDb()['_id'])) : $obj->getDb()['Setting']['Language']);
            $this->roll = [
                'id' => ['required', Rule::in($obj->getDb()['_id'])],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$this->language][$state]['IdReq'],
                'id.in'=>$obj->getDb()[$this->language][$state]['IdInv'],
                'email.email' => $this->errorUserEmail ,
                'email.required' => $this->errorUserEmailRequired,
    
                'password.min' => $this->errorUserPassword ,
                'password.required' => $this->errorUserPasswordRequired,
            ];
            $this->users = (array)$obj->getDb()['User'];
            $this->successfully = $obj->getDb()[$this->language][$state]['AdminLogin'];
            $obj->makeValidation();
        }else if(isset($obj->getDb()[@unserialize(request()->cookie($obj->getDb()['_id']))])){
            parent::__construct(unserialize(request()->cookie($obj->getDb()['_id'])),
            $obj->getDb()[unserialize(request()->cookie($obj->getDb()['_id']))][$state]['Title'],
            $obj->getDb()[unserialize(request()->cookie($obj->getDb()['_id']))]['Html']['Direction']);
            $obj->setupViewLang();
            $this->button1 = $obj->getDb()[$this->language][$state]['ButtonLanguage'];
            $this->button2 = $obj->getDb()[$this->language][$state]['ButtonSaveLanguage'];
            $this->button3 = $obj->getDb()[$this->language][$state]['ButtonLoginUser'];
            $this->label1 = $obj->getDb()[$this->language][$state]['LabelSettingLanguage'];
            $this->myAppId = $obj->getDb()['_id'];
            $this->label2 = $obj->getDb()[$this->language][$state]['LabelUserEmail'];
            $this->label3 = $obj->getDb()[$this->language][$state]['LabelUserPassword'];
            $this->label4 = $obj->getDb()[$this->language][$state]['LabelLoginUser'];
            $this->hint1 = $obj->getDb()[$this->language][$state]['HintUserEmail'];
            $this->hint2 = $obj->getDb()[$this->language][$state]['HintUserPassword'];
            $this->myRadios = MyLanguage::fromArray($obj->getDb()[$this->language]['AllNamesLanguage']);
        }else{
            Cookie::queue($obj->getDb()['_id'], serialize($obj->getDb()['Setting']['Language']),2628000);
            parent::__construct($obj->getDb()['Setting']['Language'],
            $obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['Title'],
            $obj->getDb()[$obj->getDb()['Setting']['Language']]['Html']['Direction']);
            $obj->setupViewLang();
            $this->button1 = $obj->getDb()[$this->language][$state]['ButtonLanguage'];
            $this->button2 = $obj->getDb()[$this->language][$state]['ButtonSaveLanguage'];
            $this->button3 = $obj->getDb()[$this->language][$state]['ButtonLoginUser'];
            $this->label1 = $obj->getDb()[$this->language][$state]['LabelSettingLanguage'];
            $this->myAppId = $obj->getDb()['_id'];
            $this->label2 = $obj->getDb()[$this->language][$state]['LabelUserEmail'];
            $this->label3 = $obj->getDb()[$this->language][$state]['LabelUserPassword'];
            $this->label4 = $obj->getDb()[$this->language][$state]['LabelLoginUser'];
            $this->hint1 = $obj->getDb()[$this->language][$state]['HintUserEmail'];
            $this->hint2 = $obj->getDb()[$this->language][$state]['HintUserPassword'];
            $this->myRadios = MyLanguage::fromArray($obj->getDb()[$this->language]['AllNamesLanguage']);
        }
    }
}
