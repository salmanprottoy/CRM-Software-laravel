<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class loginController extends Controller
{
    public function index()
    {
    	return view('login.index');
    }
    public function verify(Request $req)
    {
    	$user = DB::table('user')
                    ->where('username', $req->username)
                    ->where('password', $req->password)
                    ->get();
    	if(count($user)>0)
    	{
            $req->session()->put('username', $req->username);
            $req->session()->put('id', $user[0]->id);
            $req->session()->put('email', $user[0]->email);
            $req->session()->put('phone', $user[0]->contactNumber);
            $req->session()->put('designation', $user[0]->designation);
    		return redirect()->route('markethome.index');
    	}
        else
        {
            return redirect('/login');
        }
    }
}
