<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
class Controller extends BaseController
{
    protected function generateUniqueIdentifier($length = 2){
        return Str::random($length) . substr(uniqid(), -6);
    }
}
