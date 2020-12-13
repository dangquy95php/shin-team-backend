<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController
{
    public function index()
    {
        return view('swagger');
    }
}