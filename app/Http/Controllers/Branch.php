<?php
namespace App\Http\Controllers;
class Branch
{
    /**
     * Create a new class instance.
     */
    private $Name;
    private $Phone;
    private $Governments;
    private $City;
    private $Street;
    private $Building;
    private $Address;
    private $Country;
    private $Follow;
    function __construct($Name, $Phone = null, $Governments = null,
    $City = null, $Street = null, $Building = null, $Address = null, $Country = null, $Follow = null)
    {
        $this->Name = $Name;
        $this->Phone = $Phone;
        $this->Governments = $Governments;
        $this->City = $City;
        $this->Street = $Street;
        $this->Building = $Building;
        $this->Address = $Address;
        $this->Country = $Country;
        $this->Follow = $Follow;
    }
    function getName(){
        return $this->Name;
    }
    function getPhone(){
        return $this->Phone;
    }
    function getGovernments(){
        return $this->Governments;
    }
    function getCity(){
        return $this->City;
    }
    function getStreet(){
        return $this->Street;
    }
    function getBuilding(){
        return $this->Building;
    }
    function getAddress(){
        return $this->Address;
    }
    function getCountry(){
        return $this->Country;
    }
    function getFollowId(){
        return $this->Follow;
    }
    static function fromArray($branch, $inout){
        $allBranch = array();
        foreach ($branch as $key => $branch)
            $allBranch[$key] = new Branch($branch['Name'], $branch['Phone'], $branch['Governments'],
                $branch['City'], $branch['Street'], $branch['Building'], $branch['Address'],
                $branch['Country'], $inout[$branch['Follow']]);        
        return $allBranch;
    }
    static function makeBranch($branch, $branchMain){
        $allBranch = Branch::makeBranch2($branchMain);
        foreach ($branch as $key => $branch)
            $allBranch[$key] = new Branch($branch['Name']);        
        return $allBranch;
    }
    static function makeBranch2($branchMain){
        return array(request()->session()->get('superId')=>new Branch($branchMain));
    }

}
