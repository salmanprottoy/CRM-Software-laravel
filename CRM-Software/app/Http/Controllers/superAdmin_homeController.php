<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;

class superAdmin_homeController extends Controller
{
    public function index(Request $req)
    {
        // return view('home.index', ['username'=> $req->session()->get('username')]);

        return view('superAdmin.index');
    }
}
