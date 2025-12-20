<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Models\mydb;

class Page extends TableInformation
{
    function __construct(ViewLanguage | ViewLanguage2 $obj, $state = null){
        if(is_null($state))
            parent::__construct($obj);
        else if(Route::currentRouteName() === 'branchMain' || Route::currentRouteName() === 'branch.delete' && request()->session()->get('superId') !== request()->session()->get('userId')){
            parent::__construct($obj);
            $this->message = [
                'id.required'=>$obj->MyInfo()[$state]['IdIsReq'],
                'id.in'=>$obj->MyInfo()[$state]['IdIsInv'],
                'not_in'=> $obj->MyInfo()[$state]['Used']
            ];
            $obj->ob = mydb::find(request()->session()->get('superId'));
            $this->roll = [
                'id'=>['required', Rule::in(array_keys((array)$obj->getDb()[$state])), Rule::notIn(request()->session()->get('userId'))]
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'editBranchRays'){
            parent::__construct($obj);
            $this->roll = [
                'id'=>['required', Rule::in(array_keys((array)mydb::find(request()->session()->get('superId'))[$state]))]
            ];
            $this->message = [
                'id.required'=>$obj->MyInfo()[$state]['IdIsReq'],
                'id.in'=>$obj->MyInfo()[$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'editTest' || Route::currentRouteName() === 'deleteItem' || Route::currentRouteName() === 'editFlexTable' || Route::currentRouteName() === 'branch.delete'){
            parent::__construct($obj);
            $this->roll = [
                'id'=>['required', Rule::in(array_keys((array)$obj->getDb()[$state]))]
            ];
            $this->message = [
                'id.required'=>$obj->MyInfo()[$state]['IdIsReq'],
                'id.in'=>$obj->MyInfo()[$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'makeChangeLanguage' || Route::currentRouteName() === 'language.change' || Route::currentRouteName() === 'language.delete' || Route::currentRouteName() === 'language.copy'){
            parent::__construct($obj);
            $this->roll = [
                'id'=>['required', Rule::in(array_keys($obj->MyInfo()['AllNamesLanguage']))]
            ];
            $this->message = [
                'id.required'=>$obj->MyInfo()[$state]['IdIsReq'],
                'id.in'=>$obj->MyInfo()[$state]['IdIsInv']
            ];
            $obj->makeValidation();
        }else if(Route::currentRouteName() === 'editTable' || Route::currentRouteName() === 'deleteTable'){
            parent::__construct($obj);
            $this->roll = [
                'id'=>['required', Rule::in(isset($obj->MyInfo()['MyFlexTables'])?array_keys($obj->MyInfo()['MyFlexTables']):null)]
            ];
            $this->message = [
                'id.required'=>$obj->MyInfo()[$state]['IdIsReq'],
                'id.in'=>$obj->MyInfo()[$state]['IdIsInv'],
            ];
            $obj->makeValidation();
        }else if(
        Route::currentRouteName() === 'lang.createLanguage'||
        Route::currentRouteName() === 'addBranchRays'||
        Route::currentRouteName() === 'createTest'||
        Route::currentRouteName() === 'createFlexTable'||
        Route::currentRouteName() === 'addTable'){
            parent::__construct($obj);
            $this->successfulyMessage = $obj->myInfo()[$state]['MessageModelCreate'];
            $obj->makeValidation();
        }
        else{
            parent::__construct($obj, $state);
            $this->title2 = $obj->MyInfo()[$state]['ScreenModelCreate'];
            $this->button1 = $obj->MyInfo()[$state]['ButtonModelCreate'];
            $this->button2 = $obj->MyInfo()[$state]['ButtonModelAdd'];
            $this->titleModelDelete = $obj->MyInfo()[$state]['ScreenModelDelete'];
            $this->messageModelDelete = $obj->MyInfo()[$state]['MessageModelDelete'];
            $this->buttonModelDelete = $obj->MyInfo()[$state]['ButtonModelDelete'];
            $this->successfully1 = $obj->MyInfo()[$state]['LoadMessage'];
        }
    }
}
