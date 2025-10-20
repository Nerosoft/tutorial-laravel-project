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
    static function fromArray(array $data): array {
        $lang = array();
        foreach ($data as $key=>$value)
            $lang[$key] =  new MyLanguage($value);
        return $lang;
    }
}
