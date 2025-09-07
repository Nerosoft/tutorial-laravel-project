<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
class TestCulturesController extends Page implements TableData
{
    public function getDb(){
        return $this->ob;
    }
    public function getDataTable(){
        return $this->getDb()[request()->route('id')]?Test::fromArray(array_reverse($this->getDb()[request()->route('id')]), $this->inputOutPut):array();
    }
    public function getRouteDelete(){
        return route('deleteItem', request()->route('id'));
    }
    public function setupViewLang(){
        $this->table8 = $this->getDb()[$this->language][request()->route('id')]['TableName'];
        $this->table9 = $this->getDb()[$this->language][request()->route('id')]['TablePrice'];
        $this->table10 = $this->getDb()[$this->language][request()->route('id')]['TableInputOutput'];
        $this->table12 = $this->getDb()[$this->language][request()->route('id')]['TableShortcut'];
        $this->label3 = $this->getDb()[$this->language][request()->route('id')]['LabelName'];
        $this->label4 = $this->getDb()[$this->language][request()->route('id')]['LabelPrice'];
        $this->label5 = $this->getDb()[$this->language][request()->route('id')]['LabelInputOutLab'];
        $this->label7 = $this->getDb()[$this->language][request()->route('id')]['LabelShortcut'];
        $this->selectBox1 = $this->getDb()[$this->language][request()->route('id')]['InputOutLab'];
        $this->hint1 = $this->getDb()[$this->language][request()->route('id')]['HintName'];
        $this->hint2 = $this->getDb()[$this->language][request()->route('id')]['HintPrice'];
        $this->hint3 = $this->getDb()[$this->language][request()->route('id')]['HintShortcut'];
    }
    public function makeValidation(){
        $this->roll['name'] = ['required', 'min:3'];
        $this->roll['shortcut'] = ['required', 'min:3'];
        $this->roll['price'] = ['required', 'integer'];
        $this->roll['input-output-lab'] = ['required', Rule::in(array_keys($this->inputOutPut))];
        $this->message['name.required'] = $this->error1;
        $this->message['name.min'] = $this->error2;
        $this->message['shortcut.required'] = $this->error9;
        $this->message['shortcut.min'] = $this->error10;
        $this->message['price.required'] = $this->error3;
        $this->message['price.integer'] = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['PriceInvalid'];
        $this->message['input-output-lab.required'] = $this->error4;
        $this->message['input-output-lab.in'] = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['InputOutputLabInvalid'];
        $arr = (array)$this->getDb()[request()->route('id')];
        $myKey = request()->input('id')?request()->input('id'):$this->generateUniqueIdentifier();
        $arr[$myKey] = array('Name'=>request()->input('name'), 'Shortcut'=>request()->input('shortcut'), 'Price'=>request()->input('price'), 'InputOutputLab'=>request()->input('input-output-lab'), 'Id'=>$myKey);
        $this->getDb()[request()->route('id')] = $arr;
    }
    public function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        $this->error1 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['NameRequired'];
        $this->error2 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['NameInvalid'];
        $this->error9 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['ShortcutRequired'];
        $this->error10 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['ShortcutInvalid'];
        $this->error3 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['PriceRequired'];
        $this->error4 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['InputOutputLabRequired'];
        $this->inputOutPut = $this->getDb()[$this->getDb()['Setting']['Language']]['SelectTestBox'];
        parent::__construct($this, request()->route('id'));
    }
    public function index($id){
        return view('all_test_cultures',[
                'lang'=> $this,
                'active'=>'TestCultures',
                'activeItem'=>$id,        
        ]);
    }
    public function makeAddTest($id){
        request()->validate($this->roll, $this->message);
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
    public function makeEditTest($id){
        request()->validate($this->roll, $this->message);
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
}
