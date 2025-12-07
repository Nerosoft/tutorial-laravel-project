<?php
namespace App\Http\Controllers;
use App\Models\mydb;
class Users
{
    /**
     * Create a new class instance.
     */
    private $Email;
    private $Password;
    private $Key;
    function __construct($Email, $Password, $Key)
    {
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Key = $Key;
    }
    function getEmail(){
        return $this->Email;
    }
    function getPassword(){
        return $this->Password;
    }
    function getKey(){
        return $this->Key;
    }
    static function fromArray(MyDatabase $obj){
        $arr = array();
        foreach ($obj->getDb()['User'] as $key => $user)
            $arr[$key] = new Users($user['Email'], $user['Password'], $user['Key']);
        return $arr;
    }
}
