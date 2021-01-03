<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\superAdmin;

class AdminloginController extends Controller
{
    public function index()
    {
        return view('Adminlogin.index');
    }

    public function verify(Request $req)
    {
        $user  = superAdmin::where('username', $req->username)
            ->where('password', $req->password)
            ->get();
        if (count($user) > 0) {
            // echo $user['type'];
            $req->session()->put('username', $req->username);
            $req->session()->put('type', $user[0]['type']);
            $req->session()->put('image', $user[0]['image']);
            if ($user[0]['type'] == 'Super Admin') {
                return redirect()->route('superAdmin.index');
            } else {
                //return redirect('/employee_home');
            }
        } else {
            $alert = array(
                'messege' => ' Wrong Information',
                'alert-type' => 'error'
            );
            return Redirect()->Back()->with($alert);
        }
    }

    public function logout(Request $req)
    {
        $req->session()->flush();

        return redirect()->route('login.index.admin');
    }
}
