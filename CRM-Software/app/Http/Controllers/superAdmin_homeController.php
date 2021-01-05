<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\superAdmin;
use App\Models\subscriber;
use App\Models\Order;

use GuzzleHttp\Client;


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




    public function report_show()
    {
        $admin_list = superAdmin::where('type', 'Admin')->get();
        //error_log($superAdmin_list);
        $orders = Order::select(DB::raw('year(transaction_date) as Year'), DB::raw('month(transaction_date) as Month'), DB::raw('sum(amount) as Income'))
            ->groupBy(DB::raw('year(transaction_date)'), DB::raw('month(transaction_date)'))
            ->get();
        //dd($orders);

        $top10subs = Order::select('name', DB::raw('sum(amount) as Income'))
            ->groupBy('name')
            ->orderBy('Income', 'desc')
            ->get();
        //dd($top10subs);
        //echo $top10subs;
        return view('superAdmin.report')
            ->with('admin', $admin_list)
            ->with('orders', $orders)
            ->with('top10subs', $top10subs);
    }

    public function coupon(Request $req)
    {
        $client = new Client();
        // $temp = $req->get('user_email');
        // $req->session()->put('checkemail', $temp);
        $response = $client->request('GET', 'http://localhost:3000/home/getNode');
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            //$admins = $data['username'];
            // print_r($admins);
            // $req->session()->flash('print', true);
            // return view('admin.adminlist')->with('admins', $admins);
            $alert = array(
                'messege' => ' Admin inserted Successfully',
                'alert-type' => 'success'
            );
            return view('superAdmin.coupon')->with('coupon', $data)->with($alert);
        } else {
            // $admins = null;
            // return view('admin.adminlist')->with('admins', $admins);
            echo "Not get";
        }

    }
}
