<?php

namespace App\Http\Controllers\ActionControllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Page;
use App\Http\Controllers\ViewLanguage2;
class DeleteCustomTableController extends Page implements ViewLanguage2
{
    function getDb(){
        return $this->ob;
    }
    function makeValidation(){
        foreach ($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'] as $key => $value) {
            $lang = $this->getDb()[$key];
            unset($lang[request()->input('id')]);
            unset($lang['Menu']['FlexTable'][request()->input('id')]);
            unset($lang['CutomLang'][request()->input('id')]);
            $this->getDb()[$key] = $lang;
        }
        if(isset($this->getDb()[request()->input('id')]))
            unset($this->getDb()[request()->input('id')]);
        $this->successfully1 = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['Delete'];
    }
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        parent::__construct($this, 'CustomTable');
        request()->validate($this->roll, $this->message);

    }
    function makeDeleteTable(){
        $this->getDb()->save();
        return back()->with('success', $this->successfully1);
    }
}
