<?php

namespace App\Http\Controllers\ActionControllers;
use Illuminate\Http\Request;
use App\Models\mydb;
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
        if(request()->session()->get('superId') === request()->input('id') && request()->input('id') === request()->session()->get('userId')){
            $this->ob = mydb::find(request()->session()->get('userId'));
            parent::__construct($this);
            $this->successfulyMessage = $this->MyInfo()['Branches']['BranchesChange'].' '.$this->MyInfo()['AppSettingAdmin']['BranchMain'];
        }
        else if(request()->session()->get('superId') === request()->input('id')){
            $this->ob = mydb::find(request()->input('id'));
            parent::__construct($this);
            $this->successfulyMessage = $this->MyInfo()['Branches']['BranchesChange'].' '.$this->MyInfo()['AppSettingAdmin']['BranchMain'];
            request()->session()->put('userId', request()->input('id'));
        }
        else{
            $this->ob = mydb::find(request()->session()->get('userId'));
            parent::__construct($this, 'Branches');
        }
    }
    function makeChangeBranch(){
        return back()->with('success', $this->successfulyMessage);
    }
}
