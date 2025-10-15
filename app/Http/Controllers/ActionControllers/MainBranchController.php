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
    public function getDb(){
        return $this->ob;
    }
    function makeValidation(){
        array_push($this->roll['id'], Rule::notIn(request()->session()->get('userId')));
        $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Used'];
        request()->validate($this->roll, $this->message);
        $this->successfulyMessage = mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['Branches']['BranchesChange'].' '.mydb::find(request()->session()->get('superId'))['Branches'][request()->input('id')]['Name'];
        request()->session()->put('userId', request()->input('id'));
    }
    public function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        if(request()->session()->get('superId') === request()->input('id') && request()->input('id') != request()->session()->get('userId')){
            $this->successfulyMessage = mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['Branches']['BranchesChange'].' '.mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['AppSettingAdmin']['BranchMain'];
            request()->session()->put('userId', request()->input('id'));
        }
        else if(request()->session()->get('superId') === request()->input('id') && request()->input('id') === request()->session()->get('userId'))
            $this->successfulyMessage = mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['Branches']['BranchesChange'].' '.mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['AppSettingAdmin']['BranchMain'];
        else
            parent::__construct($this, 'Branches');
    }
    public function makeChangeBranch(){
        return back()->with('success', $this->successfulyMessage);
    }
}
