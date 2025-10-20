<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mydb;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
class CustomFlexTableController extends Page implements TableData
{
    public function getDb(){
        return $this->ob;
    }
    public function getDataTable(){
        return array_reverse(CustomTable::fromArray(array_slice($this->getDb()[$this->language]['Menu']['FlexTable'], 1)));
    }
    public function setupViewLang(){
        $this->model2 = $this->getDb()[$this->language]['CustomTable']['ScreenModelCreate'];
        $this->button2 = $this->getDb()[$this->language]['CustomTable']['ButtonModelCreate'];
        $this->model3 = $this->getDb()[$this->language]['CustomTable']['ScreenModelEdit'];
        $this->button3 = $this->getDb()[$this->language]['CustomTable']['ButtonModelEdit'];
        $this->TableName = $this->getDb()[$this->language]['CustomTable']['NameTable'];
        $this->LabelName = $this->getDb()[$this->language]['CustomTable']['LabelName'];
        $this->HintName = $this->getDb()[$this->language]['CustomTable']['HintName'];

        $this->LabelInputNumber = $this->getDb()[$this->language]['CustomTable']['LabelInputNumber'];
        $this->HintInputNumber = $this->getDb()[$this->language]['CustomTable']['HintInputNumber'];
    }
    public function makeValidation(){
        $this->roll['name'] = ['required', 'min:3'];
        $this->message['name.required'] = $this->error1;
        $this->message['name.min'] = $this->error2;
        if(Route::currentRouteName() === 'addTable'){
            $this->roll['input_number'] = ['required', 'integer', 'between:1,8'];
            $this->message['input_number.required'] =  $this->error3;
            $this->message['input_number.integer'] =  $this->error4;
            $this->message['input_number.between'] =  $this->error4;
            $key = $this->generateUniqueIdentifier();
            $myInputKey = array();
             for ($i=0; $i < request()->input('input_number'); $i++)
                array_push($myInputKey, $this->generateUniqueIdentifier());
            foreach ($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'] as $code => $value) {
                $lang = $this->getDb()[$code];
                $lang['Menu']['FlexTable'][$key] = request()->input('name');
                $lang[$key] = $lang['TablePage']['Info'];
                $lang['CutomLang'][$key] = request()->input('name');
                foreach ($myInputKey as $key2){
                    $lang[$key]['TableHead'][$key2] = $lang['TablePage']['Input']['InputNameTable'];
                    $lang[$key]['Label'][$key2] = $lang['TablePage']['Input']['InputLabel'];
                    $lang[$key]['Hint'][$key2] = $lang['TablePage']['Input']['InputHint'];
                    $lang[$key]['ErrorsMessageReq'][$key2] = $lang['TablePage']['Input']['InputErrorsMessageReq'];
                    $lang[$key]['ErrorsMessageInv'][$key2] = $lang['TablePage']['Input']['InputErrorsMessageInv'];
                }
                $this->getDb()[$code] = $lang;
            }
            $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['MessageModelCreate'];
        }else{
            foreach ($this->getDb()[$this->getDb()['Setting']['Language']]['AllNamesLanguage'] as $key => $value) {
                $lang = $this->getDb()[$key];
                $lang['Menu']['FlexTable'][request()->input('id')] = request()->input('name');
                $lang['CutomLang'][request()->input('id')] = request()->input('name');
                $this->getDb()[$key] = $lang;
            }
            $this->successfulyMessage = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['MessageModelEdit'];
        }
        request()->validate($this->roll, $this->message);
    }
    function __construct(){
        $this->ob = mydb::find(request()->session()->get('userId'));
        $this->error1 = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['NameTableIsReq'];
        $this->error2 = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['NameTableIsInv'];
        $this->error3 = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['InputNumberTableIsReq'];
        $this->error4 = $this->getDb()[$this->getDb()['Setting']['Language']]['CustomTable']['InputNumberTableIsInv'];
        parent::__construct($this, 'CustomTable');        
    }
    function index(){
        return view('custom_table',[
            'lang'=> $this,
        ]);
    }
    function makeAddEditTable(){
        $this->getDb()->save();
        return back()->with('success', $this->successfulyMessage);
    }
}
