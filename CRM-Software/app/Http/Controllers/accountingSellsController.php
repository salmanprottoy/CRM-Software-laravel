<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountingSellsController extends Controller
{
    //
    public function index()
    {

        //error_log('asdadfdf');
        return view('accountingSellsHome.index');
    }
}
