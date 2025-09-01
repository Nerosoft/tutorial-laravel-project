<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mydb;
class AdminMenu extends SettingPage
{
    function __construct(MyDatabase | TableData $obj, $state){
        parent::__construct($obj->getDb()['Setting']['Language'],
        $obj->getDb()[$obj->getDb()['Setting']['Language']][$state]['Title'],
        $this->getDb()[$obj->getDb()['Setting']['Language']]['Html']['Direction']);
        
        $this->selectBox3 = $obj->getDb()[$this->language]['AppSettingAdmin']['BranchesCompany'];
        $this->title101 = $obj->getDb()[$this->language]['AppSettingAdmin']['Offcanvas'];
        $this->label1 = $obj->getDb()[$this->language]['AppSettingAdmin']['Logout'];
        $this->label2 = $obj->getDb()[$this->language]['AppSettingAdmin']['AdminDashboard'];
        $this->myMenuApp =  new Menu($obj, $state, $this->language);
        $this->MyBranch = Branch::makeBranch((array)mydb::find(request()->session()->get('superId'))['Branches'],$obj->getDb()[$obj->getDb()['Setting']['Language']]['AppSettingAdmin']['BranchMain']);
    }
}
