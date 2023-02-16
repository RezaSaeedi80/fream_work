<?php

namespace App\Controllers;

use Main\Request\Request;

class MainController
{

    public function index(Request $request)
    {
        print_r($request);
        exit;
    }
}