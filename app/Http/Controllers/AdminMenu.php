<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;

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
            $this->MyBranch = Branch::makeBranch($obj);
            if(Route::currentRouteName() === 'SystemLang'){
                $this->myMenuApp = array('Home'=>$obj->MyInfo()['Menu']['Home'], 'SystemLang'=>$obj->MyInfo()['Menu']['SystemLang']);
                foreach ($obj->MyInfo()['AllNamesLanguage'] as $key => $value){
                    $this->myMenuApp[$key] = array($value);
                    foreach (array_keys($obj->MyInfo()) as $key2 => $table) 
                        $this->myMenuApp[$key][$table] = $obj?->MyInfo()[$table]['MYTITLE']??$obj->MyInfo()['AppSettingAdmin'][$table];
                }
            }
            else if(isset($obj->MyInfo()['MyFlexTables'])){
               $this->myMenuApp = $obj->MyInfo()['Menu'];
               $arr = $obj->MyInfo()['MyFlexTables'];
               array_unshift($arr, $this->myMenuApp['MyFlexTables']);
               $this->myMenuApp['MyFlexTables'] = $arr;
            }else{
                $this->myMenuApp = $obj->MyInfo()['Menu'];
                unset($this->myMenuApp['MyFlexTables']);
            }
        }
    }

        public function getIconByKey($key){
        if($key === 'Home')//--
            return 'box-arrow-left.svg';
        else if($key === 'SystemLang')
                return 'gear.svg';  
        else if($key === 'ChangeLanguage')
            return 'globe-asia-australia.svg';
        else if($key === 'TestCultures')
            return 'pencil-square.svg';
        else if($key === 'Test')
            return 'pencil-square.svg';
        else if($key === 'Cultures')
            return 'globe.svg';
        else if($key === 'Packages')
            return 'box.svg';
        else if($key === 'Branches')
            return 'hospital.svg';
        else if($key === 'Login')
            return 'database-exclamation.svg';
        else if($key === 'Register')
            return 'arrows.svg';
        else if($key === 'Menu')
            return 'menu-button-fill.svg';
        else if($key === 'TableInfo')
            return 'person-add.svg';
        else if($key === 'AppSettingAdmin')
            return 'box.svg';
        else if($key === 'SelectTestBox')
            return 'hospital.svg';
        else if($key === 'SelectBranchBox')
            return 'gear.svg';
        else if($key === 'AllNamesLanguage')
            return 'bag-check-fill.svg';
        else if($key === 'CustomTable')
            return 'arrow-up-circle-fill.svg';
        else if($key === 'TablePage')
            return 'calendar4-event.svg';
        else if($key === 'Html')
            return 'bar-chart-line-fill.svg';
        else
            return 'camera2.svg';
    }
}
