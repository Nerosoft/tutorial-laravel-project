<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;
class FlexTableController extends Page implements TableData
{
    public function getDb(){
        return $this->ob;
    }
    public function getDataTable(){
        return array_reverse((array)$this->getDb()[request()->route('id')]);
    }
    public function setupViewLang(){
        $this->TableHead = $this->getDb()[$this->language][request()->route('id')]['TableHead'];
        $this->Label = $this->getDb()[$this->language][request()->route('id')]['Label'];
        $this->Hint = $this->getDb()[$this->language][request()->route('id')]['Hint'];
    }
    public function makeValidation(){
        $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')][Route::currentRouteName() === 'editFlexTable'?'MessageModelEdit':'MessageModelCreate'];
        foreach ($this->ErrorsMessageReq as $key => $value) {
            $this->roll[$key] = ['required', 'min:3'];
            $this->message[$key.'.required'] = $value;
            $this->message[$key.'.min'] = $this->ErrorsMessageInv[$key];
        }
        $arr = (array)$this->getDb()[request()->route('id')];
        $arr[Route::currentRouteName() === 'editFlexTable' ?request()->input('id'):$this->generateUniqueIdentifier()] = array();
        foreach ($this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['TableHead'] as $key => $value)
            $arr[array_key_last($arr)][$key] = request()->input($key)??null;
        $this->getDb()[request()->route('id')] = $arr;
        request()->validate($this->roll, $this->message);
    }
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        $this->ErrorsMessageReq = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['ErrorsMessageReq'];
        $this->ErrorsMessageInv = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['ErrorsMessageInv'];
        parent::__construct($this, request()->route('id'));
    }
    function index($id){
        return view('flex_table',[
            'lang'=> $this,
        ]);
    }
    function makeAddEditFlexTable(){
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);    
    }
}
