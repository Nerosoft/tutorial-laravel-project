<?php

namespace App\Http\Controllers\ActionControllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Page;
use App\Http\Controllers\ViewLanguage2;
class AuthChangeLangController extends Page implements ViewLanguage2
{
    function getDb(){
        return $this->ob;
    }
    function makeValidation(){
        $this->roll['userAdmin']=['required', Rule::in($this->getDb()['_id']), function ($attribute, $value, $fail){
            if(@unserialize(request()->cookie(request()->input('userAdmin'))) === request()->input('id'))
                $fail($this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['Used']);
        }];
        $this->message['userAdmin.required'] = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['UserIdIsReq'];
        $this->message['userAdmin.in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['UserIdIsInv'];
    
        request()->validate($this->roll, $this->message);
        $this->messageServer = $this->getDb()[request()->input('id')]['ChangeLanguage']['ChangeLang'].$this->getDb()[request()->input('id')]['AllNamesLanguage'][request()->input('id')];
    }
    function __construct(){
        $this->ob = mydb::find(request()->input('userAdmin'))??mydb::first();
        parent::__construct($this, 'ChangeLanguage');
    }
    function makeChangeLanguage(){
        Cookie::queue(request()->input('userAdmin'), serialize(request()->input('id')),2628000);
        return back()->with('success', $this->messageServer);
    }
}
