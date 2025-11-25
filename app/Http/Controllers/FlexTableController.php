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
    function MyInfo(){
        return $this->ob[$this->language];
    }
    public function getDataTable(){
        return is_null($this->getDb()[request()->route('id')])?array():array_reverse($this->getDb()[request()->route('id')]);
    }
    public function setupViewLang(){
        $this->TableHead = $this->MyInfo()[request()->route('id')]['TableHead'];
        $this->Label = $this->MyInfo()[request()->route('id')]['Label'];
        $this->Hint = $this->MyInfo()[request()->route('id')]['Hint'];
    }
    public function makeValidation(){
        foreach ($this->ErrorsMessageReq as $key => $value) {
            $this->roll[$key] = ['required', 'min:3'];
            $this->message[$key.'.required'] = $value;
            $this->message[$key.'.min'] = $this->ErrorsMessageInv[$key];
        }
        $arr = (array)$this->getDb()[request()->route('id')];
        if(Route::currentRouteName() === 'createFlexTable'){
            $keyId = $this->generateUniqueIdentifier();
            $arr[$keyId] = array();
            foreach ($this->MyInfo()[request()->route('id')]['TableHead'] as $key => $value)
                $arr[$keyId][$key] = request()->input($key);
        }
        else{
            $this->successfulyMessage = $this->MyInfo()[request()->route('id')]['MessageModelEdit'];
            $arr[request()->input('id')] = array();
            foreach ($this->MyInfo()[request()->route('id')]['TableHead'] as $key => $value)
                $arr[request()->input('id')][$key] = request()->input($key);
        }
        request()->validate($this->roll, $this->message);
        $this->getDb()[request()->route('id')] = $arr;
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
