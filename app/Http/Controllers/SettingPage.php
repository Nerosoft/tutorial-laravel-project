<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingPage extends Controller
{
    function __construct($language, $obj = null, $title = null , $direction = null){
        if(is_null($obj) && is_null($title) && is_null($direction)){
            $this->language = $language;
        }else if(is_null($obj)){
            $this->language = $language;
            $this->title = $title;
            $this->direction = $direction;
        }else{
            $this->language = $language;
            $this->title = $obj->MyInfo()['Title'];
            $this->direction = $obj->MyInfo('Html')['Direction'];
        }
    }
}
