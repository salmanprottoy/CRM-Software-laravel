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
    public function package_show()
    {
        error_log('--------------------------------------------------------------------------------------------');
        $data = file_get_contents('assets/json/package_list.json');
        error_log('-----------------------------------------------' . $data . '---------------------------------------------');
        $data_decode = json_decode($data, true);
        print_r($data_decode);
        // error_log('-----------------------------------------------' . $data_decode . '---------------------------------------------');
        error_log('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=');

        //error_log($superAdmin_list);
        return view('superAdmin.package_list')->with('package', $data_decode);
    }
}
