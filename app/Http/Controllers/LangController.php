<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;

class LangController extends Page implements TableData
{
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        $this->error1 = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['NewLangNameRequired'];
        $this->error2 = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['NewLangNameInvalid'];
        $this->allNames = $this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'];
        parent::__construct($this, 'ChangeLanguage');
    }
     function index(){
        return $this->view;
    }
    function getDataTable(){
        $tableData = array();
        foreach (array_reverse($this->allNames) as $key => $value)
            $tableData[$key] = new MyLanguage($value);
        return $tableData;
    }
    function getDb(){
        return $this->ob;
    }
    function setupViewLang(){
        $this->NameLangaue = $this->getDb()[$this->language]['ChangeLanguage']['NameLangaue'];
        $this->label3 = $this->getDb()[$this->language]['ChangeLanguage']['LanguageInfo'];     
        $this->label4 = $this->getDb()[$this->language]['ChangeLanguage']['LanguageSelect'];
        $this->label5 = $this->getDb()[$this->language]['ChangeLanguage']['LabelChangeLanguageMessage'];
        $this->label6 = $this->getDb()[$this->language]['ChangeLanguage']['LabelCopyLanguageMessage'];
        $this->LabelNameLanguage = $this->getDb()[$this->language]['ChangeLanguage']['LabelCreateLanguage'];
        $this->HintCopyLanguage = $this->getDb()[$this->language]['ChangeLanguage']['HintCopyLangName'];
        $this->label7 = $this->getDb()[$this->language]['ChangeLanguage']['LabelNewLangName'];
        $this->hint1 = $this->getDb()[$this->language]['ChangeLanguage']['HintNewLangName'];
        $this->button4 = $this->getDb()[$this->language]['ChangeLanguage']['ButtonChangeLanguageMessage'];
        $this->title2 = $this->getDb()[$this->language]['ChangeLanguage']['TitleChangeLanguageMessage'];
        $this->view = view('change_language', [
            'lang'=>$this,
            'active'=>'ChangeLanguage',
        ]);
    }
    function makeValidation(){
        $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['MessageModelEdit'];
        $this->roll['lang_name'] = ['required', 'min:3'];
        $this->message['lang_name.required'] = $this->error1;
        $this->message['lang_name.min'] = $this->error2;
        $this->newKey = $this->generateUniqueIdentifier();
        foreach ($this->allNames as $key=>$value) {
            $myLang = $this->getDb()[$key];
            $myLang['AllNamesLanguage'][request()->input('id')??$this->newKey] = request()->input('lang_name');
            $this->getDb()[$key] = $myLang;
        }
    }
    function getRouteDelete(){
        return route('language.delete');
    }
    function makeAddLanguage(){
        $myLanguage = $this->getDb()['MyLanguage'];
        $myLanguage['AllNamesLanguage'] = $this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'];
        $this->getDb()[$this->newKey] = $myLanguage;
        request()->validate($this->roll, $this->message);
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
    function makeCopyLanguage(){
        request()->validate($this->roll, $this->message);
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
}
