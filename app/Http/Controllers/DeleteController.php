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
        $this->successfully1 = $this->getDb()[$this->getDb()['Setting']['Language']][request()->route('id')]['Delete'];
        $arr = $this->getDb()[request()->route('id')];
        unset($arr[request()->input('id')]);
        if(empty($arr))
            unset($this->getDb()[request()->route('id')]);
        else
            $this->getDb()[request()->route('id')] = $arr;
    }
    public function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        parent::__construct($this, request()->route('id'));
    }
    public function action(){
        request()->validate($this->roll, $this->message);
        $this->getDb()->save();
        return back()->with('success', $this->successfully1);
    }
}
