<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminloginController extends Controller
{
    public function index()
    {
        return view('Adminlogin.index');
    }
}
