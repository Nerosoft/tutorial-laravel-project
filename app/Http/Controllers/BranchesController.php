<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

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
        return Branch::fromArray(array_reverse($this->getDb()['Branches']??(array)mydb::find(request()->session()->get('superId'))['Branches']), $this->getDb()[$this->language]['SelectBranchBox']);
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
    function makeAddBranch(){
        request()->validate($this->roll, $this->message);
        $this->getDb()->save();
        $myBranch = $this->getDb()->toArray();
        unset($myBranch['User']);
        unset($myBranch['Branches']);
        $myBranch['_id'] = array_key_last($this->getDb()['Branches']);
        mydb::insert($myBranch);
        return back()->with('success', $this->successfulyMessage);
    }
    function makeEditBranch(){
        request()->validate($this->roll, $this->message);
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
    public function makeValidation(){
        $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['MessageModelEdit'];
        $this->roll['brance_rays_name'] = ['required', 'min:3'];
        $this->roll['brance_rays_phone'] = ['required', 'regex:/^[0-9]{11}$/'];
        $this->roll['brance_rays_governments'] = ['required', 'min:3'];
        $this->roll['brance_rays_city'] = ['required', 'min:3'];
        $this->roll['brance_rays_street'] = ['required', 'min:3'];
        $this->roll['brance_rays_building'] = ['required', 'min:3'];
        $this->roll['brance_rays_address'] = ['required', 'min:3'];
        $this->roll['brance_rays_country'] = ['required', 'min:3'];
        $this->roll['brance_rays_follow'] = ['required', Rule::in(array_keys($this->branchInputOutput))];
        $this->message['brance_rays_name.min'] = $this->error10;
        $this->message['brance_rays_name.required'] = $this->error1;
        $this->message['brance_rays_phone.regex'] = $this->error11;
        $this->message['brance_rays_phone.required'] = $this->error2;
        $this->message['brance_rays_governments.min'] = $this->error12;
        $this->message['brance_rays_governments.required'] = $this->error3;
        $this->message['brance_rays_city.min'] = $this->error13;
        $this->message['brance_rays_city.required'] = $this->error4;
        $this->message['brance_rays_street.min'] = $this->error14;
        $this->message['brance_rays_street.required'] = $this->error5;
        $this->message['brance_rays_building.min'] = $this->error15;
        $this->message['brance_rays_building.required'] = $this->error6;
        $this->message['brance_rays_address.min'] = $this->error16;
        $this->message['brance_rays_address.required'] = $this->error7;
        $this->message['brance_rays_country.min'] = $this->error17;
        $this->message['brance_rays_country.required'] = $this->error8;
        $this->message['brance_rays_follow.required'] = $this->error9;
        $this->message['brance_rays_follow.in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['BranceRaysFollowValue'];
        $this->ob = request()->session()->get('userId') === request()->session()->get('superId') ? $this->getDb() : mydb::find(request()->session()->get('superId'));
        $arr = (array)$this->getDb()['Branches'];
        $arr[isset($arr[request()->input('id')])?request()->input('id'):Str::uuid()->toString()] = array('Name'=>request()->input('brance_rays_name'), 'Phone'=>request()->input('brance_rays_phone'),'Governments'=>request()->input('brance_rays_governments'), 'City'=>request()->input('brance_rays_city'), 'Street'=>request()->input('brance_rays_street'), 'Building'=>request()->input('brance_rays_building'), 'Address'=>request()->input('brance_rays_address'), 'Country'=>request()->input('brance_rays_country'), 'Follow'=>request()->input('brance_rays_follow'));
        $this->getDb()['Branches'] = $arr;
    }
    public function getRouteDelete(){
        return route('branch.delete');
    }
}
