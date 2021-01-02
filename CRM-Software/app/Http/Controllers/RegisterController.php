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
}
