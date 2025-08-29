<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Page extends TableInformation
{
    function __construct(TableData $obj, $state){
        if(
        Route::currentRouteName() === 'branchMain'||
        Route::currentRouteName() === 'language.changeLanguage'||
        Route::currentRouteName() === 'language.change'||
        Route::currentRouteName() === 'language.delete'||
        Route::currentRouteName() === 'language.copy'||
        Route::currentRouteName() === 'editTest'||
        Route::currentRouteName() === 'editBranchRays'||
        Route::currentRouteName() === 'deleteItem'||
        Route::currentRouteName() === 'branch.delete'){
            $this->roll = [
                'id'=>['required']
            ];
            $this->message = [
                'id.required'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsReq'],
                'id.in'=>$obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }
        else if(
        Route::currentRouteName() === 'lang.createLanguage'||
        Route::currentRouteName() === 'createTest'||
        Route::currentRouteName() === 'addBranchRays'){
            $this->successfulyMessage = $obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['MessageModelCreate'];
            $obj->makeValidation2();
        }
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
            $this->actionDelete = $obj->getRouteDelete();
        }
    }
}
