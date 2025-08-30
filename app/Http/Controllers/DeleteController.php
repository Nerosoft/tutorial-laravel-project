<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
class DeleteController extends Page implements ViewLanguage2
{
     public function getDb(){
        return $this->ob;
    }
    public function makeValidation(){
        array_push($this->roll['id'], Rule::in(array_keys((array)$this->getDb()[request()->route('id')])));
    }
    public function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        parent::__construct($this, request()->route('id'));
        $this->successfully1 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['Delete'];
    }
    public function action($id){
        request()->validate($this->roll, $this->message);
        $arr = $this->getDb()[request()->route('id')];
        unset($arr[request()->input('id')]);
        $this->getDb()[request()->route('id')] = $arr;
        $this->getDb()->save();
        return back()->with('success', $this->successfully1);
    }
}
