<?php
namespace App\Http\Controllers;
class MenuItem
{
    /**
     * Create a new class instance.
     */
    public function __construct($name, $item)
    {
        $this->Name = $name;
        $this->Item = $item;
    }
}
