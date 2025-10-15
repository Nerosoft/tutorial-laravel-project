<?php

namespace App\Http\Controllers\ActionControllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Http\Controllers\DeleteController;

class BranchDeleteController extends DeleteController
{
    public function __construct(){
        parent::__construct();
        array_push($this->roll['id'], Rule::notIn(request()->session()->get('userId')));
        $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Used'];
        if(request()->session()->get('superId') !== request()->session()->get('userId'))
            $this->ob = mydb::find(request()->session()->get('superId'));
        $arr = (array)$this->getDb()['Branches'];
        unset($arr[request()->input('id')]);
        $this->getDb()['Branches'] = $arr;
        request()->validate($this->roll, $this->message);
        mydb::find(request()->input('id'))->delete();
    }
    public function makeDeleteMyBranch(){
        return $this->action();
    }
}
