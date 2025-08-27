<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class mydb extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $collection = 'mydb';
}
