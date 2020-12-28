<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use App\Models\superAdmin;
use App\Models\subscriber;


class superAdmin_homeController extends Controller
{
    public function index(Request $req)
    {

        // echo "<script>console.log('asdada');</script>";


        // return view('home.index', ['username'=> $req->session()->get('username')]);
        error_log('asdadfdf');
        return view('superAdmin.index');
    }
    public function superAdmin_show()
    {


        $superAdmin_list = superAdmin::where('type', 'Super Admin')->get();
        //error_log($superAdmin_list);
        return view('superAdmin.superAdmin_list')->with('superAdmin', $superAdmin_list);
    }



    public function admin_show()
    {
        $admin_list = superAdmin::where('type', 'Admin')->get();
        //error_log($superAdmin_list);
        return view('superAdmin.admin_list')->with('admin', $admin_list);
    }


    public function subscriber_show()
    {
        $subscriber_list = subscriber::all();
        //error_log($superAdmin_list);
        return view('superAdmin.subscriber_list')->with('subscriber', $subscriber_list);
    }
}
