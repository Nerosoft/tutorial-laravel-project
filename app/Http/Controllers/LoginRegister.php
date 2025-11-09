<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;
class LoginRegister extends SettingPage
{
    function __construct(MyInfo $obj, $lang){
        if(Route::currentRouteName() === 'makeLogin' || Route::currentRouteName() === 'makeRegister'){
            parent::__construct($lang);
            $this->roll = [
                'userAdmin' => ['required', Rule::in($obj->getDb()['_id'])],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ];
            $this->message = [
                'userAdmin.required'=>$obj->MyInfo()['IdReq'],
                'userAdmin.in'=>$obj->MyInfo()['IdInv'],
                'email.email' => $obj->MyInfo()['UserEmail'],
                'email.required' => $obj->MyInfo()['UserEmailRequired'],
    
                'password.min' => $obj->MyInfo()['UserPassword'],
                'password.required' => $obj->MyInfo()['UserPasswordRequired'],
            ];
            $this->users = (array)$obj->getDb()['User'];
            $this->successfully = $obj->MyInfo()['AdminLogin'];
            $obj->makeValidation();
        }else{
            parent::__construct($lang, $obj);
            $this->errorUserEmail = $obj->MyInfo()['UserEmail'];
            $this->errorUserEmailRequired = $obj->MyInfo()['UserEmailRequired'];
            $this->errorUserPassword = $obj->MyInfo()['UserPassword'];
            $this->errorUserPasswordRequired = $obj->MyInfo()['UserPasswordRequired'];
            $obj->setupViewLang();
            $this->button1 = $obj->MyInfo()['ButtonLanguage'];
            $this->button2 = $obj->MyInfo()['ButtonSaveLanguage'];
            $this->button3 = $obj->MyInfo()['ButtonLoginUser'];
            $this->label1 = $obj->MyInfo()['LabelSettingLanguage'];
            $this->myAppId = $obj->getDb()['_id'];
            $this->label2 = $obj->MyInfo()['LabelUserEmail'];
            $this->label3 = $obj->MyInfo()['LabelUserPassword'];
            $this->label4 = $obj->MyInfo()['LabelLoginUser'];
            $this->hint1 = $obj->MyInfo()['HintUserEmail'];
            $this->hint2 = $obj->MyInfo()['HintUserPassword'];
            $this->myRadios = MyLanguage::fromArray($obj->MyInfo('AllNamesLanguage'));
        }
    }
}
