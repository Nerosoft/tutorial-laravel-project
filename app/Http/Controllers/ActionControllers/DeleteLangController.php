<?php

namespace App\Http\Controllers\ActionControllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Page;
use App\Http\Controllers\ViewLanguage2;
class DeleteLangController extends Page implements ViewLanguage2
{
    function getDb(){
        return $this->ob;
    }
    function MyInfo(){
        return $this->ob[$this->language];
    }
    function makeValidation(){
        array_push($this->roll['id'], Rule::notIn($this->language));
        $this->messageServer = $this->MyInfo()['ChangeLanguage']['DeleteLanguage'];
        $this->message['not_in'] = $this->MyInfo()['ChangeLanguage']['Used'];
        foreach ($this->MyInfo()['AllNamesLanguage'] as $key=>$value) {
            $myLang = $this->getDb()[$key];
            unset($myLang['AllNamesLanguage'][request()->input('id')]);
            $this->getDb()[$key] = $myLang;
        }
        unset($this->getDb()[request()->input('id')]);
    }
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        parent::__construct($this, 'ChangeLanguage');
        request()->validate($this->roll, $this->message);
    }
    function makeDeleteMyLanguage(){
        $this->getDb()->save();
        return back()->with('success', $this->messageServer);
    }
}
