<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Models\mydb;

class Page extends TableInformation
{
    function __construct(TableData | ViewLanguage2 $obj, $state){
        if(Route::currentRouteName() === 'branchMain' || Route::currentRouteName() === 'branch.delete' && request()->session()->get('superId') !== request()->session()->get('userId')){
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv'],
                'not_in'=> $obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['Used']
            ];
            $obj->ob = mydb::find(request()->session()->get('superId'));
            $this->roll = [
                'id'=>['required', Rule::in(array_keys((array)$obj->getDb()[$state])), Rule::notIn(request()->session()->get('userId'))]
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'editBranchRays'){
            $this->roll = [
                'id'=>['required', Rule::in(array_keys((array)mydb::find(request()->session()->get('superId'))[$state]))]
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'editTest' || Route::currentRouteName() === 'deleteItem' || Route::currentRouteName() === 'editFlexTable' || Route::currentRouteName() === 'branch.delete'){
            $this->roll = [
                'id'=>['required', Rule::in(array_keys((array)$obj->getDb()[$state]))]
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'makeChangeLanguage' || Route::currentRouteName() === 'language.change' || Route::currentRouteName() === 'language.delete' || Route::currentRouteName() === 'language.copy'){
            $this->roll = [
                'id'=>['required', Rule::in(array_keys($obj->getDb()[$obj->getDb()['Setting']['Language']]['AllNamesLanguage']))]
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'editTable' || Route::currentRouteName() === 'deleteTable'){
            $this->roll = [
                'id'=>['required', Rule::in(array_keys(array_slice($obj->getDb()[$obj->getDb()['Setting']['Language']]['Menu']['FlexTable'],1)))]
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv'],
            ];
            $obj->makeValidation();
        }else if(
        Route::currentRouteName() === 'lang.createLanguage'||
        Route::currentRouteName() === 'addBranchRays'||
        Route::currentRouteName() === 'createTest'||
        Route::currentRouteName() === 'createFlexTable'||
        Route::currentRouteName() === 'addTable')
            $obj->makeValidation();
        else{
            parent::__construct($obj, $state);
            $this->title2 = $obj->getDb()[$this->language][$state]['ScreenModelCreate'];
            $this->title3 = $obj->getDb()[$this->language][$state]['ScreenModelEdit'];
            $this->button1 = $obj->getDb()[$this->language][$state]['ButtonModelCreate'];
            $this->button2 = $obj->getDb()[$this->language][$state]['ButtonModelAdd'];
            $this->button3 = $obj->getDb()[$this->language][$state]['ButtonModelEdit'];
            $this->table7 = $obj->getDb()[$this->language][$state]['TableId'];
            $this->table11 = $obj->getDb()[$this->language][$state]['TabelEvent'];
            $this->titleModelDelete = $obj->getDb()[$this->language][$state]['ScreenModelDelete'];
            $this->messageModelDelete = $obj->getDb()[$this->language][$state]['MessageModelDelete'];
            $this->buttonModelDelete = $obj->getDb()[$this->language][$state]['ButtonModelDelete'];
            $this->successfully1 = $obj->getDb()[$this->language][$state]['LoadMessage'];
        }
    }
}
