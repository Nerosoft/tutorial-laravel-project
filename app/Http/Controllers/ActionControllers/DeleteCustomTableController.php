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
            request()->validate($this->roll, $this->message);
            $lang = $this->getDb()[$key];
            if(count($lang['MyFlexTables']) === 1)
                unset($lang[request()->input('id')], $lang['MyFlexTables'], $lang['CutomLang'][request()->input('id')]);
            else
                unset($lang[request()->input('id')], $lang['MyFlexTables'][request()->input('id')], $lang['CutomLang'][request()->input('id')]);
            $this->getDb()[$key] = $lang;
        }
        if(isset($this->getDb()[request()->input('id')]))
            unset($this->getDb()[request()->input('id')]);
        $this->successfully1 = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['Delete'];
    }
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        parent::__construct($this, 'CustomTable');

    }
    function makeDeleteTable(){
        $this->getDb()->save();
        return back()->with('success', $this->successfully1);
    }
}
