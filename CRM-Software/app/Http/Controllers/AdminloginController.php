<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
// use Socialite;
use Illuminate\Support\Facades\DB;
use App\Models\superAdmin;

class AdminloginController extends Controller
{
    public function index()
    {

        return view('Adminlogin.index');
    }
    public function redirectToLinkedin()
    {
        error_log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=');
        return Socialite::driver('linkedin')->redirect();
    }
    public function handleLinkedinCallback(Request $req)
    {
        error_log('lllllllllllllllllllllllllllllll');
        $user = Socialite::driver('linkedin')->user();
        $this->_registerOrLoginUser($user, $req);
        return redirect()->route('superAdmin.index');
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


    public function _registerOrLoginUser($data, Request $req)
    {

        error_log('afsfsdgsfgdfgdbg');
        $user = superAdmin::where('Email', $data->email)->first();
        if (!$user) {
            $user = new superAdmin();
            $user->Name = $data->name;
            $user->username = $data->email;
            $user->password = "";
            $user->Email = $data->email;
            $user->image = $data->avatar;
            $user->type = 'Super Admin';

            $user->provider_id = $data->id;
            $user->save();





            $req->session()->put('username', $user->username);
            $req->session()->put('type', $user->type);
            $req->session()->put('image', $user->image);
            //echo "<h1>Login Successfull <a href='/login/updateInfo'>Click here</a> to Update Some Information</h1>";
            // return redirect()->route('superAdmin.index');
            // return view('superAdmin.index');
        } else {
            $req->session()->put('username', $user->username);
            $req->session()->put('type', $user->type);
            $req->session()->put('image', $user->image);
            //echo "<h1>Login Successfull <a href='/admin'>Click here</a> to go to the Dashboard</h1>";
            // return redirect()->route('superAdmin.index');
            // return view('superAdmin.index');
        }
    }

    public function logout(Request $req)
    {
        $req->session()->flush();

        return redirect()->route('login.index.admin');
    }
}
