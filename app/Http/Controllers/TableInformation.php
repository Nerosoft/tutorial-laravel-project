<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableInformation extends AdminMenu
{
    function __construct(ViewLanguage | ViewLanguage2 $obj, $state = null){
        if(is_null($state))
            parent::__construct($obj); 
        else{
            parent::__construct($obj, $state);
            $this->table1 = $obj->MyInfo()['TableInfo']['Ssearch'];
            $this->table2 = $obj->MyInfo()['TableInfo']['InfoEmpty'];
            $this->table3 = $obj->MyInfo()['TableInfo']['ZeroRecords'];
            $this->table4 = $obj->MyInfo()['TableInfo']['Info'];
            $this->table5 = $obj->MyInfo()['TableInfo']['LengthMenu'];
            $this->table6 = $obj->MyInfo()['TableInfo']['InfoFiltered'];
            $this->table7 = $obj->MyInfo()[$state]['TableId'];
            $this->table11 = $obj->MyInfo()[$state]['TabelEvent'];
            $this->button3 = $obj->MyInfo()[$state]['ButtonModelEdit'];
            $this->title3 = $obj->MyInfo()[$state]['ScreenModelEdit'];

            $obj->setupViewLang();
        }
    }
}
