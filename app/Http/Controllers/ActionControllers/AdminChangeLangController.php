<?php

namespace App\Http\Controllers\ActionControllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Page;
use App\Http\Controllers\ViewLanguage2;
class AdminChangeLangController extends Page implements ViewLanguage2
{
    public function getDb(){
        return $this->ob;
    }
    function makeValidation(){
        array_push($this->roll['id'], Rule::notIn($this->getDb()['Setting']['Language']));
        $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['Used'];
        $setting = $this->getDb()['Setting'];
        $setting['Language'] = request()->input('id');
        request()->validate($this->roll, $this->message);
        $this->messageServer = $this->getDb()[request()->input('id')]['ChangeLanguage']['ChangeLang'].$this->getDb()[request()->input('id')]['AllNamesLanguage'][request()->input('id')];
        $this->getDb()['Setting'] = $setting;
    }
    public function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        parent::__construct($this, 'ChangeLanguage');
    }
    public function makeChangeMyLanguage(){
        $this->getDb()->save();
        return back()->with('success', $this->messageServer);
    }
}
