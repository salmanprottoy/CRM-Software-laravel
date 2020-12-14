<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use App\Models\superAdmin;

class superAdmin_homeController extends Controller
{
    public function index(Request $req)
    {
        // return view('home.index', ['username'=> $req->session()->get('username')]);

        return view('superAdmin.index');
    }
    public function superAdmin_show()
    {
        $superAdmin_list = superAdmin::all();
        return view('superAdmin.superAdmin_list')->with('superAdmin', $superAdmin_list);
    }
}
