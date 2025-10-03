<?php
namespace App\Http\Controllers;
class Test
{
    /**
     * Create a new class instance.
     */
    //order var important
    private $Name;
    private $Shortcut;
    private $Price;
    private $InputOutputLab;
    //----------------------
    public function __construct($Name, $Shortcut, $Price, $InputOutputLab)
    {
        $this->Name = $Name;
        $this->Shortcut = $Shortcut;
        $this->Price = $Price;
        $this->InputOutputLab = $InputOutputLab;
    }
    public function getShortcut(){
        return $this->Shortcut;
    }
    public function getName(){
        return $this->Name;
    }
    public function getPrice(){
        return $this->Price;
    }
    public function getInputOutputLabId(){
        return $this->InputOutputLab;
    }
    public function getObject(){
        return get_object_vars($this);
    }
    public static function fromArray(array $data, $inputOutput): array {
        $test = array();
        foreach ($data as $key=>$data) 
            $test[$key] =  new Test($data['Name'], $data['Shortcut'], $data['Price'], $inputOutput[$data['InputOutputLab']]);
        return $test;
    }
}