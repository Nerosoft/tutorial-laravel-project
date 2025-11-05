<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingPage extends Controller
{
    function __construct($language, $title = null, $direction = null){
        if(is_null($title) && is_null($direction)){
            $this->language = $language;
        }else{
            $this->language = $language;
            $this->title = $title;
            $this->direction = $direction;
        }
    }
}
