<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableInformation extends AdminMenu
{
    function __construct(TableData | ViewLanguage $obj, $state){
        parent::__construct($obj, $state);
        $this->table1 = $obj->getDb()[$this->language]['TableInfo']['Ssearch'];
        $this->table2 = $obj->getDb()[$this->language]['TableInfo']['InfoEmpty'];
        $this->table3 = $obj->getDb()[$this->language]['TableInfo']['ZeroRecords'];
        $this->table4 = $obj->getDb()[$this->language]['TableInfo']['Info'];
        $this->table5 = $obj->getDb()[$this->language]['TableInfo']['LengthMenu'];
        $this->table6 = $obj->getDb()[$this->language]['TableInfo']['InfoFiltered'];
        $obj->setupViewLang();
        $this->tableData = $obj->getDataTable();
    }
}
