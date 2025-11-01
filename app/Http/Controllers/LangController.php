<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

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
        return MyLanguage::fromArray(array_reverse($this->allNames));
    }
    function getDb(){
        return $this->ob;
    }
    function setupViewLang(){
        $this->NameLangaue = $this->getDb()[$this->language]['ChangeLanguage']['NameLangaue'];
        $this->label3 = $this->getDb()[$this->language]['ChangeLanguage']['LanguageInfo'];     
        $this->label4 = $this->getDb()[$this->language]['ChangeLanguage']['LanguageSelect'];
        $this->label5 = $this->getDb()[$this->language]['ChangeLanguage']['LabelChangeLanguageMessage'];
        $this->LabelNameLanguage = $this->getDb()[$this->language]['ChangeLanguage']['LabelCreateLanguage'];
        $this->label7 = $this->getDb()[$this->language]['ChangeLanguage']['LabelNewLangName'];
        $this->hint1 = $this->getDb()[$this->language]['ChangeLanguage']['HintNewLangName'];
        $this->button4 = $this->getDb()[$this->language]['ChangeLanguage']['ButtonChangeLanguageMessage'];
        $this->title2 = $this->getDb()[$this->language]['ChangeLanguage']['TitleChangeLanguageMessage'];
        $this->view = view('change_language', [
            'lang'=>$this,
        ]);
    }
    function makeValidation(){
        $this->roll['lang_name'] = ['required', 'min:3'];
        $this->message['lang_name.required'] = $this->error1;
        $this->message['lang_name.min'] = $this->error2;
        if(Route::currentRouteName() === 'lang.createLanguage'){
            $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['MessageModelCreate'];
            $this->newKey = $this->generateUniqueIdentifier();
            foreach ($this->allNames as $key=>$value) {
                $myLang = $this->getDb()[$key];
                $myLang['AllNamesLanguage'][$this->newKey] = request()->input('lang_name');
                $this->getDb()[$key] = $myLang;
            }
        }else{
            $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['MessageModelEdit'];
            foreach ($this->allNames as $key=>$value) {
                $myLang = $this->getDb()[$key];
                $myLang['AllNamesLanguage'][request()->input('id')] = request()->input('lang_name');
                $this->getDb()[$key] = $myLang;
            }
        }
        request()->validate($this->roll, $this->message);
    }
    function makeAddLanguage(){
        $myLanguage = $this->getDb()['MyLanguage'];
        $myLanguage['AllNamesLanguage'] = $this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'];
        if(isset($this->getDb()[$this->getDb()['Setting']['Language']]['MyFlexTables']) && !empty($this->getDb()[$this->getDb()['Setting']['Language']]['MyFlexTables']))
            foreach ($this->getDb()[$this->getDb()['Setting']['Language']]['MyFlexTables'] as $key => $value){ 
                $myLanguage['MyFlexTables'][$key] = $value;
                $myLanguage['CutomLang'][$key] = $this->getDb()[$this->getDb()['Setting']['Language']]['CutomLang'][$key];
                $myLanguage[$key] = $this->getDb()[$this->getDb()['Setting']['Language']][$key];   
            } 
        $this->getDb()[$this->newKey] = $myLanguage;
        return $this->makeEditLanguage();
    }
    function makeEditLanguage(){
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
}
