<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingPage extends Controller
{
    function __construct($language, $title = null, $direction = null){
        $this->language = $language;
        $this->title = $title;
        $this->direction = $direction;
    }
}
