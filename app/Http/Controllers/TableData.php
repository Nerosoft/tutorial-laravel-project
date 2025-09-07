<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface TableData extends ViewLanguage
{
    public function getDataTable();
    public function getRouteDelete();
}
