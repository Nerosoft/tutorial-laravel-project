<?php
namespace App\Http\Controllers;
class CustomTable
{
    /**
     * Create a new class instance.
     */
    //order var important
    private $Name;
    //----------------------
    public function __construct($Name)
    {
        $this->Name = $Name;
    }

    public function getName(){
        return $this->Name;
    }
    public static function fromArray(array $data): array {
        $CustomTable = array();
        foreach ($data as $key=>$value)
            if(array_key_first($data) !== $key)
                $CustomTable[$key] =  new CustomTable($value);
        return $CustomTable;
    }
}