<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
class Menu
{
    private $Home;
    private $SystemLang;
    private $ChangeLanguage;
    private $TestCultures;
    private $FlexTable;
    private $Branches;
    private $CustomTable;
    /**
     * Create a new class instance.
     */
    public function __construct(MyDatabase $ob)
    {
        if(Route::currentRouteName() === 'SystemLang'){
            $this->Home = $ob->getDb()[$ob->language]['Menu']['Home'];
            $this->SystemLang = $ob->getDb()[$ob->language]['Menu']['SystemLang'];
            $arr = array();
            foreach (array_keys($ob->getDb()[$ob->language]) as $key => $value) 
                if($value === 'AllNamesLanguage' || $value === 'MyFlexTables' || $value === 'SelectBranchBox' || $value === 'SelectTestBox' || $value === 'Html')
                    $arr[$value] = $ob->getDb()[$ob->language]['AppSettingAdmin'][$value];
                else
                    $arr[$value] = $ob->getDb()[$ob->language][$value][array_key_first($ob->getDb()[$ob->language][$value])];
            foreach ($ob->getDb()[$ob->language]['AllNamesLanguage'] as $key => $value)
                $this->CustomMenu[$key] = new MenuItem($value, $arr);
        }
        else if(isset($ob->getDb()[$ob->language]['MyFlexTables']) && !empty($ob->getDb()[$ob->language]['MyFlexTables'])){
            $this->ChangeLanguage = $ob->getDb()[$ob->language]['Menu']['ChangeLanguage'];
            $this->SystemLang = $ob->getDb()[$ob->language]['Menu']['SystemLang'];
            $this->Home = $ob->getDb()[$ob->language]['Menu']['Home'];
            $allTest = $ob->getDb()[$ob->language]['Menu']['TestCultures'];
            $this->TestCultures = new MenuItem(array_shift($allTest), $allTest);
            $this->FlexTable = new MenuItem($ob->getDb()[$ob->language]['Menu']['MyFlexTables'], $ob->getDb()[$ob->language]['MyFlexTables']);
            $this->Branches = $ob->getDb()[$ob->language]['Menu']['Branches'];
            $this->CustomTable = $ob->getDb()[$ob->language]['Menu']['CustomTable'];
        }else{
            $this->ChangeLanguage = $ob->getDb()[$ob->language]['Menu']['ChangeLanguage'];
            $this->SystemLang = $ob->getDb()[$ob->language]['Menu']['SystemLang'];
            $this->Home = $ob->getDb()[$ob->language]['Menu']['Home'];
            $allTest = $ob->getDb()[$ob->language]['Menu']['TestCultures'];
            $this->TestCultures = new MenuItem(array_shift($allTest), $allTest);
            $this->Branches = $ob->getDb()[$ob->language]['Menu']['Branches'];
            $this->CustomTable = $ob->getDb()[$ob->language]['Menu']['CustomTable'];
        }
    }
    function getMenu(){
        return array_filter(get_object_vars($this), function ($value) {
            return !is_null($value);
        });
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
