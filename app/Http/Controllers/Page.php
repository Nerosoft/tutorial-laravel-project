<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Models\mydb;

class Page extends TableInformation
{
    function __construct(TableData | ViewLanguage2 $obj, $state){
        if(Route::currentRouteName() === 'branchMain'|| Route::currentRouteName() === 'branch.delete'||
        Route::currentRouteName() === 'editBranchRays'|| Route::currentRouteName() === 'editTest' || 
        Route::currentRouteName() === 'deleteItem' || Route::currentRouteName() === 'editFlexTable'){
            $this->roll = [
                'id'=>['required', Rule::in(array_keys($obj->getDb()[$state]??(array)mydb::find(request()->session()->get('superId'))[$state]))]
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'makeChangeLanguage' || Route::currentRouteName() === 'language.change' ||
        Route::currentRouteName() === 'language.delete' || Route::currentRouteName() === 'language.copy'){
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
                'id'=>['required', Rule::in(array_keys($obj->getDb()[$obj->getDb()['Setting']['Language']]['Menu']['FlexTable'])), Rule::notIn(array_key_first($this->getDb()[$this->getDb()['Setting']['Language']]['Menu']['FlexTable']))]
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv'],
                'id.not_in'=>$this->getDb()[$this->getDb()['Setting']['Language']][$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(
        Route::currentRouteName() === 'lang.createLanguage'||
        Route::currentRouteName() === 'createTest'||
        Route::currentRouteName() === 'createFlexTable'||
        Route::currentRouteName() === 'addTable'||
        Route::currentRouteName() === 'addBranchRays')
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
