<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;
class LoginRegister extends SettingPage
{
    function __construct($lang, ViewLanguage $obj, $state){
        $this->errorUserEmail = $obj->getDb()[$lang][$state]['UserEmail'];
        $this->errorUserEmailRequired = $obj->getDb()[$lang][$state]['UserEmailRequired'];
        $this->errorUserPassword = $obj->getDb()[$lang][$state]['UserPassword'];
        $this->errorUserPasswordRequired = $obj->getDb()[$lang][$state]['UserPasswordRequired'];
        if(Route::currentRouteName() === 'makeLogin' || Route::currentRouteName() === 'makeRegister'){
            parent::__construct($lang);
            $this->roll = [
                'userAdmin' => ['required', Rule::in($obj->getDb()['_id'])],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ];
            $this->message = [
                'userAdmin.required'=>$obj->MyInfo()[$state]['IdReq'],
                'userAdmin.in'=>$obj->MyInfo()[$state]['IdInv'],
                'email.email' => $this->errorUserEmail,
                'email.required' => $this->errorUserEmailRequired,
    
                'password.min' => $this->errorUserPassword,
                'password.required' => $this->errorUserPasswordRequired,
            ];
            $this->users = (array)$obj->getDb()['User'];
            $this->successfully = $obj->MyInfo()[$state]['AdminLogin'];
            $obj->makeValidation();
        }else{
            parent::__construct($lang, $obj, $state);
            $obj->setupViewLang();
            $this->button1 = $obj->MyInfo()[$state]['ButtonLanguage'];
            $this->button2 = $obj->MyInfo()[$state]['ButtonSaveLanguage'];
            $this->button3 = $obj->MyInfo()[$state]['ButtonLoginUser'];
            $this->label1 = $obj->MyInfo()[$state]['LabelSettingLanguage'];
            $this->myAppId = $obj->getDb()['_id'];
            $this->label2 = $obj->MyInfo()[$state]['LabelUserEmail'];
            $this->label3 = $obj->MyInfo()[$state]['LabelUserPassword'];
            $this->label4 = $obj->MyInfo()[$state]['LabelLoginUser'];
            $this->hint1 = $obj->MyInfo()[$state]['HintUserEmail'];
            $this->hint2 = $obj->MyInfo()[$state]['HintUserPassword'];
            $this->myRadios = MyLanguage::fromArray($obj->MyInfo()['AllNamesLanguage']);
        }
    }
}
