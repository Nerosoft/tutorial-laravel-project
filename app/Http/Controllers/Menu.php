<?php

namespace App\Http\Controllers;
class Menu
{
    private $Home;
    private $SystemLang;
    private $ChangeLanguage;
    private $TestCultures;
    private $Branches;
    /**
     * Create a new class instance.
     */
    public function __construct(MyDatabase $ob, $state, $language)
    {
        if($state === 'SystemLang'){
            $this->Home = $ob->getDb()[$language]['Menu']['Home'];
            $this->SystemLang = $ob->getDb()[$language]['Menu']['SystemLang'];
            foreach ($ob->getDb()[$language]['AllNamesLanguage'] as $key => $value)
                $this->CustomMenu[$key] = new MenuItem($value, $ob->getDb()[$language]['CutomLang']);
        }
        else{
            $this->ChangeLanguage = $ob->getDb()[$language]['Menu']['ChangeLanguage'];
            $this->SystemLang = $ob->getDb()[$language]['Menu']['SystemLang'];
            $this->Home = $ob->getDb()[$language]['Menu']['Home'];
            $this->TestCultures = new MenuItem($ob->getDb()[$language]['Menu']['TestCultures']['Name'], $ob->getDb()[$language]['Menu']['TestCultures']['Item']);
            $this->Branches = $ob->getDb()[$language]['Menu']['Branches'];
        }
    }
    public function getMenu(){
        return array_filter(get_object_vars($this), function ($value) {
            return !is_null($value);
        });
    }
    public function getIconByKey($key){
        if($key === 'Admin')//--
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
            return 'arrows.svg';
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
        else if($key === 'CutomLang')
            return 'badge-3d-fill.svg';
        else if($key === 'AllNamesLanguage')
            return 'bag-check-fill.svg';
        else //if($key === 'Html')
            return 'bar-chart-line-fill.svg';
    }
}
