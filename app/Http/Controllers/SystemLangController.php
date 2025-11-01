<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class SystemLangController extends TableInformation implements ViewLanguage
{
    public function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        $this->error1 = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['TextRequired'];
        $this->error2 = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['TextLenght'];
        if(Route::currentRouteName() === 'edit.editAllLanguage'){
            $this->makeValidation();
        }else
            parent::__construct($this, 'SystemLang');

    }
    public function index($nameLanguage = null, $id = null){
        return view('all_language', $nameLanguage === null?[
            'lang'=> $this,
            'active'=>'SystemLang',
        ]:[
            'lang'=> $this,
        ]);
    }
    public function getDataTable(){
        if(isset($this->getDb()[request()->route('lang')][request()->route('id')]))
            return $this->getDb()[request()->route('lang')][request()->route('id')];
        else if(is_null(request()->route('lang')) && is_null(request()->route('id'))){
            $tableData = array();
            foreach ($this->getDb()[$this->language]['AllNamesLanguage'] as $key=>$value)
                $tableData[$key] = $this->getDb()[$key];
            return $tableData;
        }
        else
            return array();
    }
    function setupViewLang(){
        $this->Left = $this->getDb()[$this->language]['SystemLang']['ltr'];
        $this->Right = $this->getDb()[$this->language]['SystemLang']['rtl'];
        $this->label3 = $this->getDb()[$this->language]['SystemLang']['Text'];
        $this->label4 = $this->getDb()[$this->language]['SystemLang']['DirectionPage']; 
        $this->table7 = $this->getDb()[$this->language]['SystemLang']['LanguageValue'];
        $this->table8 = $this->getDb()[$this->language]['SystemLang']['LanguageEvent'];
        $this->table9 = $this->getDb()[$this->language]['SystemLang']['LanguageId'];
        $this->table10 = $this->getDb()[$this->language]['SystemLang']['LanguageName'];
        $this->model1 = $this->getDb()[$this->language]['SystemLang']['Title'];
        $this->model2 = $this->getDb()[$this->language]['SystemLang']['TitleDirection'];
        $this->button2 = $this->getDb()[$this->language]['SystemLang']['SaveDirection'];
        $this->button3 = $this->getDb()[$this->language]['SystemLang']['SaveText'];
        $this->WordHint = $this->getDb()[$this->language]['SystemLang']['WordHint'];
    }
    function makeValidation(){
        $this->roll = [
            'id'=>['required', Rule::in(array_keys($this->getDb()[$this->getDb()['Setting']['Language']]['CutomLang']))],
        ];
        $this->message = [
            'id.required'=>$this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditTableRequired'],
            'id.in'=>$this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditTableInvalid'],
        ];
        $this->roll['word' ] = ['required', request()->route('id') !== 'Html' ? 'min:2' : Rule::in(['ltr', 'rtl'])];
        $this->roll['myLang'] = ['required', Rule::in(array_keys($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage']))];
        $this->roll['name'] = ['required', function ($attribute, $value, $fail){
            if(request()->route('item') !== null && !isset($this->getDb()[request()->route('lang')][request()->route('id')][request()->route('name')][request()->route('item')])){
                $fail($this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditKeyInvalid']);
                $fail($this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditKey2Invalid']);
            }else if(!isset($this->getDb()[request()->route('lang')][request()->route('id')][request()->route('name')]))
                $fail($this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditKeyInvalid']);
        }];
        $this->message['word.required'] = $this->error1;
        $this->message['word.'.(request()->route('id') !== 'Html' ?'min':'in')] = $this->error2;
        $this->message['myLang.required'] = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditLanguageRequired'];
        $this->message['myLang.in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditLanguageInvalid'];
        $this->message['id.required'] = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditTableRequired'];
        $this->message['id.in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditTableInvalid'];
        $this->message['name.required'] = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['EditKeyRequired'];
        $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']]['SystemLang']['AllLanguageEdit'];
    }
    function makeEditLanguage($lang, $id, $name, $item = null){
        Validator::make([...request()->all(), 'myLang'=>$lang, 'id'=>$id, 'name'=>$name, 'item'=>$item], $this->roll, $this->message)->validate();
        $var1 = $this->getDb()[$lang];
        if($item === null)
            $var1[$id][$name] = request()->input('word');
        else
            $var1[$id][$name][$item] = request()->input('word');
        $this->getDb()[$lang] = $var1;
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
    function getDb(){
        return $this->ob;
    }
}
