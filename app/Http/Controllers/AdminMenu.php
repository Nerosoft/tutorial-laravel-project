<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mydb;
class AdminMenu extends SettingPage
{
    function __construct(MyDatabase | TableData | ViewLanguage2 $obj, $state = null){
        if(is_null($state))
            parent::__construct($obj->getDb()['Setting']['Language']);
        else{
            parent::__construct($obj->getDb()['Setting']['Language'], $obj, $state);
            $this->selectBox3 = $obj->MyInfo()['AppSettingAdmin']['BranchesCompany'];
            $this->title101 = $obj->MyInfo()['AppSettingAdmin']['Offcanvas'];
            $this->label1 = $obj->MyInfo()['AppSettingAdmin']['Logout'];
            $this->label2 = $obj->MyInfo()['AppSettingAdmin']['AdminDashboard'];
            $this->myMenuApp =  new Menu($obj);
            $this->MyBranch = Branch::makeBranch($obj);
        }
    }
}
