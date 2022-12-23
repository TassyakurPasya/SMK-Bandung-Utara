<?php

namespace App\Controllers;

class Template extends BaseController
{
    public function __construct()
    {
        
    }
    public function index()
    {
        return view('template/index');
    }
}
