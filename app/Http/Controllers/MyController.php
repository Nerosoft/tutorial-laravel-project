<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cookie;

class MyController extends Page implements ViewLanguage2
{
    public function getDb(){
        return $this->ob;
    }
    function makeValidation(){ 
        if(request()->session()->get('superId') === request()->session()->get('userId') && Route::currentRouteName() === 'branch.delete'){
           $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Used'];
            $this->messageServer = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Delete'];
            $arr = (array)$this->getDb()['Branches'];
            array_push($this->roll['id'], Rule::in(array_keys($arr)));
            array_push($this->roll['id'], Rule::notIn(request()->session()->get('userId')));
            unset($arr[request()->input('id')]);
            $this->getDb()['Branches'] = $arr;
        }
        else if(Route::currentRouteName() === 'branch.delete'){
            $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Used'];
            $this->messageServer = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Delete'];
            $this->ob = mydb::find(request()->session()->get('superId'));
            $arr = (array)$this->getDb()['Branches'];
            array_push($this->roll['id'], Rule::in(array_keys($arr)));
            array_push($this->roll['id'], Rule::notIn(request()->session()->get('userId')));
            unset($arr[request()->input('id')]);
            $this->getDb()['Branches'] = $arr;
        }  
        else if(request()->session()->get('superId') === request()->input('id') && Route::currentRouteName() === 'branchMain'){
            array_push($this->roll['id'], Rule::notIn(request()->session()->get('userId')));
            $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Used'];
            $this->messageServer = (mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['Branches']['BranchesChange']).' '.(mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']]['AppSettingAdmin']['BranchMain']);
        }
        else if(Route::currentRouteName() === 'branchMain'){
            array_push($this->roll['id'], Rule::in(array_keys((array)mydb::find(request()->session()->get('superId'))['Branches'])));
            array_push($this->roll['id'], Rule::notIn(request()->session()->get('userId')));
            $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['Branches']['Used'];
            $this->messageServer = (mydb::find(request()->input('id'))[mydb::find(request()->input('id'))['Setting']['Language']??null]['Branches']['BranchesChange']??null).' '.(mydb::find(request()->session()->get('superId'))['Branches'][request()->input('id')]['Name']??null);
        }
        else if(Route::currentRouteName() === 'language.delete'){
            array_push($this->roll['id'], Rule::in(array_keys($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'])));
            array_push($this->roll['id'], Rule::notIn($this->getDb()['Setting']['Language']));
            $this->messageServer = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['DeleteLanguage'];
            $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['Used'];
            foreach ($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'] as $key=>$value) {
                $myLang = $this->getDb()[$key];
                unset($myLang['AllNamesLanguage'][request()->input('id')]);
                $this->getDb()[$key] = $myLang;
            }
            unset($this->getDb()[request()->input('id')]);
        }
        //clint
        else if(Route::currentRouteName() === 'makeChangeLanguage'){
            array_push($this->roll['id'], Rule::in(array_keys($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'])));
            array_push($this->roll['id'], Rule::notIn(unserialize(request()->cookie(request()->input('userAdmin')))??null));
            $this->messageServer = ($this->getDb()[request()->input('id')]['ChangeLanguage']['ChangeLang']??null).($this->getDb()[request()->input('id')]['AllNamesLanguage'][request()->input('id')]??null);
            $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['Used'];
        }//admin
        else{//'language.change'
            array_push($this->roll['id'], Rule::in(array_keys($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'])));
            array_push($this->roll['id'], Rule::notIn($this->getDb()['Setting']['Language']));
            $this->messageServer = ($this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['ChangeLang']).($this->getDb()[request()->input('id')]['AllNamesLanguage'][request()->input('id')]??null);
            $this->message['not_in'] = $this->getDb()[$this->getDb()['Setting']['Language']]['ChangeLanguage']['Used'];
            $setting = $this->getDb()['Setting'];
            $setting['Language'] = request()->input('id');
            $this->getDb()['Setting'] = $setting;
        }
    }
    public function __construct(){
        $this->ob = request()->session()->get('userId')?mydb::find(request()->session()->get('userId')):(mydb::find(request()->input('userAdmin'))?mydb::find(request()->input('userAdmin')):mydb::first());
        parent::__construct($this, Route::currentRouteName() === 'branch.delete' || Route::currentRouteName() === 'branchMain'?'Branches':'ChangeLanguage');
        request()->validate($this->roll, $this->message);
    }
    public function makeChangeBranch(){   
        request()->session()->put('userId', request()->input('id'));
        return back()->with('success', $this->messageServer);
    }
    public function makeChangeMyLanguage(){
        $this->getDb()->save();
        return back()->with('success', $this->messageServer);
    }
    public function makeDeleteMyLanguage(){
        $this->getDb()->save();
        return back()->with('success', $this->messageServer);
    }
    public function makeChangeLanguage(){
        Cookie::queue(request()->input('userAdmin'), serialize(request()->input('id')),2628000);
        return back()->with('success', $this->messageServer);
    }
    public function makeDeleteMyBranch(){
        $this->getDb()->save();
        mydb::find(request()->input('id'))->delete();
        return back()->with('success', $this->messageServer);
    }
}
