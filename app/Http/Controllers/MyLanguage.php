<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyLanguage
{
    private $name;
    function __construct($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }
}
