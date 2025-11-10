<?php

namespace App\Http\Controllers\ActionControllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Page;
use App\Http\Controllers\ViewLanguage2;
class MainBranchController extends Page implements ViewLanguage2
{
    function getDb(){
        return $this->ob;
    }
    function MyInfo(){
        return $this->ob[$this->language];
    }
    function makeValidation(){
        request()->validate($this->roll, $this->message);
        $this->successfulyMessage = mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['Branches']['BranchesChange'].' '.$this->getDb()['Branches'][request()->input('id')]['Name'];
        request()->session()->put('userId', request()->input('id'));
    }
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        if(request()->session()->get('superId') === request()->input('id') && request()->input('id') === request()->session()->get('userId')){
            parent::__construct($this);
            $this->successfulyMessage = $this->MyInfo()['Branches']['BranchesChange'].' '.$this->MyInfo()['AppSettingAdmin']['BranchMain'];
        }
        else if(request()->session()->get('superId') === request()->input('id')){
            $this->successfulyMessage = mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['Branches']['BranchesChange'].' '.mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['AppSettingAdmin']['BranchMain'];
            request()->session()->put('userId', request()->input('id'));
        }
        else
            parent::__construct($this, 'Branches');
    }
    function makeChangeBranch(){
        return back()->with('success', $this->successfulyMessage);
    }
}
