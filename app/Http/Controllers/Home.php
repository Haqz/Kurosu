<?php

namespace App\Http\Controllers;


use Brian2694\Toastr\Facades\Toastr;

class Home extends Controller
{
    public function index()
    {
        return view('welcome');
    }

}
