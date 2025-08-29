<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;

class BranchesController extends Page implements TableData
{
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        $this->error1 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysNameRequired'];
        $this->error2 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysPhoneRequired'];
        $this->error3 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysGovernmentsRequired'];
        $this->error4 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysCityRequired'];
        $this->error5 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysStreetRequired'];
        $this->error6 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysBuildingRequired'];
        $this->error7 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysAddressRequired'];
        $this->error8 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysCountryRequired'];
        $this->error9 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysFollowRequired'];
        $this->error10 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysNameLength'];
        $this->error11 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysPhoneLength'];
        $this->error12 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysGovernmentsLength'];
        $this->error13 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysCityLength'];
        $this->error14 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysStreetLength'];
        $this->error15 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysBuildingLength'];
        $this->error16 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysAddressLength'];
        $this->error17 = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysCountryLength'];
        $this->branchInputOutput = $this->getDb()[$this->getDb()['Setting']['Language']]['SelectBranchBox'];
        parent::__construct($this, 'Branches');
    }
    function index(){
        return $this->view;
    }
    public function getDataTable(){
        return mydb::find(request()->session()->get('superId'))['Branches']?Branch::fromArray(array_reverse(mydb::find(request()->session()->get('superId'))['Branches']), $this->getDataBase()[$this->language]['SelectBranchBox']):array();
    }
    function getDb(){
        return $this->ob;
    }
    function setupViewLang(){
        $this->table8 = $this->getDb()[$this->language]['Branches']['BranchStreet'];
        $this->table9 = $this->getDb()[$this->language]['Branches']['BranchName'];
        $this->table10 = $this->getDb()[$this->language]['Branches']['BranchPhone'];
        $this->table16 = $this->getDb()[$this->language]['Branches']['BranchGovernments'];
        $this->table17 = $this->getDb()[$this->language]['Branches']['BranchCity'];
        $this->table12 = $this->getDb()[$this->language]['Branches']['BranchBuilding'];
        $this->table13 = $this->getDb()[$this->language]['Branches']['BranchAddress'];
        $this->table14 = $this->getDb()[$this->language]['Branches']['BranchCountry'];
        $this->table15 = $this->getDb()[$this->language]['Branches']['BranchFollow'];
        //get all hint
        $this->hint1 = $this->getDb()[$this->language]['Branches']['BranchRaysName'];
        $this->hint2 = $this->getDb()[$this->language]['Branches']['BranchRaysPhone'];
        $this->hint3 = $this->getDb()[$this->language]['Branches']['BranchRaysCountry'];
        $this->hint4 = $this->getDb()[$this->language]['Branches']['BranchRaysGovernments'];
        $this->hint5 = $this->getDb()[$this->language]['Branches']['BranchRaysCity'];
        $this->hint6 = $this->getDb()[$this->language]['Branches']['BranchRaysStreet'];
        $this->hint7 = $this->getDb()[$this->language]['Branches']['BranchRaysBuilding'];
        $this->hint8 = $this->getDb()[$this->language]['Branches']['BranchRaysAddress'];
        $this->selectBox1 = $this->getDb()[$this->language]['Branches']['WithRaysOut'];
        $this->view = view('Branch', [
            'lang'=>$this,
            'active'=>'Branches',
        ]);
    }
    function makeValidation(){

    }
    public function makeValidation2(){

    }
    public function getRouteDelete(){
        return route('branch.delete');
    }
}
