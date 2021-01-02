<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function getstarted()
    {
        $data = file_get_contents('assets/json/package_list.json');
        $data_decode = json_decode($data, true);

        return view('landing.getstarted')->with('package', $data_decode);
    }
    public function register($package)
    {
        return view('landing.register')->with('package', $package);
    }

    public function apply_coupon(Request $req)
    {
        $coupon = $req->coupon;
        // dd($coupon);
        $check = DB::table('coupons')->where('coupon', $coupon)->first();
        //dd($check);
        if ($check) {
            Session::put('coupon', [
                'coupon_name' => $check->coupon,
                'discount' => $check->discount

            ]);
            $alert = array(
                'messege' => 'Done',
                'alert-type' => 'success'
            );
            return Redirect()->Back()->with($alert);
        } else {
            $alert = array(
                'messege' => 'Invalid Coupon',
                'alert-type' => 'warning'
            );
            return Redirect()->Back()->with($alert);
        }
    }
    public function remove_coupon()
    {
        Session::forget('coupon');
        $alert = array(
            'messege' => ' Coupon removed',
            'alert-type' => 'warning'
        );
        return Redirect()->Back()->with($alert);
    }

    public function manager_register()
    {
        return view('landing.manager_register');
    }
    public function manager_register_complete(Request $req)
    {
        $register = array();
        // $register['mname'] = $req->name;
        $register['username'] = $req->username;
        $register['password'] = $req->password;
        $register['type'] = $req->type;

        $register_manager = DB::table('user')->insert($register);
        if ($register_manager) {
            $alert = array(
                'messege' => ' Registration Complete',
                'alert-type' => 'success'
            );
            return Redirect()->Back()->with($alert);
        } else {
            $alert = array(
                'messege' => ' Registration failed',
                'alert-type' => 'warning'
            );
            return Redirect()->route('login')->with($alert);
        }
    }

    public function uname_search(Request $req)
    {
        if ($req->ajax()) {
            $value = $req->get('search');
            // error_log($value);
            $found = DB::table('user')->where('username', $value)->get();
            //    error_log($found);

            return response()->json($found);
        } else {
            return Redirect()->Back();
        }
    }
    public function manager_search(Request $req)
    {
        if ($req->ajax()) {
            $value = $req->get('search');
            error_log('---------------------------------------------------------------------------------------');
            error_log($value);
            $found = DB::table('orders')
                ->where('mname', $value)
                ->where('status', 'Complete')
                ->get();
            error_log($found);

            return response()->json($found);
        } else {
            return Redirect()->Back();
        }
    }
}
