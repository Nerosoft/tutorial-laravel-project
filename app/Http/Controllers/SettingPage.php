<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingPage extends Controller
{
    function __construct($language, MyDatabase $obj = null, $state = null){
        if(is_null($obj)){
            $this->language = $language;
        }else{
            $this->language = $language;
            $this->title = $obj->MyInfo()[$state]['Title'];
            $this->direction = $obj->MyInfo()['Html']['Direction'];
        }
    }
}
