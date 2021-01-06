<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
      
            if($user[0]->type=='employee')
            {
                    $req->session()->put('username', $req->username);
                    $req->session()->put('id', $user[0]->id);
                    $req->session()->put('email', $user[0]->email);
                    $req->session()->put('phone', $user[0]->contactNumber);
                    $req->session()->put('designation', $user[0]->designation);
                    return redirect()->route('markethome.index');
            }
            else if($user[0]->type=='manager')
            {

            }
            else if($user[0]->type=='accountingSells')
            {
                $req->session()->put('username', $req->username);
                $req->session()->put('id', $user[0]->id);
                $req->session()->put('email', $user[0]->email);
                $req->session()->put('phone', $user[0]->contactNumber);
                $req->session()->put('designation', $user[0]->designation);
                return redirect()->route('accountingSellsHome.index');
            }
        }
        else
        {
            return redirect('/login');
        }
    }
}
