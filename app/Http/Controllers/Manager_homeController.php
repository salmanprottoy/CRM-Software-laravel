<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\customer;
use App\Models\leads;
use App\Models\product;
use App\Models\eventinfo;
use App\Models\noticeinfo;
use App\Models\user;
use App\Models\buyer;

class Manager_homeController extends Controller
{
    public function index(Request $req)
    {

        // echo "<script>console.log('asdada');</script>";


        // return view('home.index', ['username'=> $req->session()->get('username')]);
        error_log('asdadfdf');
        return view('Manager.index');
    }
    /*public function superAdmin_show()
    {
 

        $superAdmin_list = superAdmin::where('type', 'Super Admin')->get();
        //error_log($superAdmin_list);
        return view('superAdmin.superAdmin_list')->with('superAdmin', $superAdmin_list);
    }
*/


   
    public function customer_show()
    {
        $customer_list = customer::all();
        //error_log($superAdmin_list);
        return view('Manager.customer_list')->with('customer', $customer_list);
    }

    public function leads_show()
    {
        $leads_list = leads::all();
        //error_log($superAdmin_list);
        return view('Manager.leads_list')->with('leads', $leads_list);
    }

    public function product_show()
    {
        $product_list = product::all();
        //error_log($superAdmin_list);
        return view('Manager.product_list')->with('product', $product_list);
    }
    public function eventinfo_show()
    {
        $eventinfo_list = eventinfo::all();
        //error_log($superAdmin_list);
        return view('Manager.eventinfo_list')->with('eventinfo', $eventinfo_list);
    }
    public function noticeinfo_show()
    {
        $noticeinfo_list = noticeinfo::all();
        //error_log($superAdmin_list);
        return view('Manager.noticeinfo_list')->with('noticeinfo', $noticeinfo_list);
    }

    public function user_show()
    {
        $user_list = user::all();
        //error_log($superAdmin_list);
        return view('Manager.user_list')->with('user', $user_list);
    }
    public function buyer_show()
    {
        $buyer_list = buyer::all();
        //error_log($superAdmin_list);
        return view('Manager.buyer_list')->with('buyer', $buyer_list);
    }
    

    
    /*public function package_show()
    {
        error_log('--------------------------------------------------------------------------------------------');
        $data = file_get_contents('assets/json/package_list.json');
        error_log('-----------------------------------------------' . $data . '---------------------------------------------');
        $data_decode = json_decode($data, true);
        print_r($data_decode);
        // error_log('-----------------------------------------------' . $data_decode . '---------------------------------------------');
        error_log('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=');

        //error_log($superAdmin_list);
        return view('Manager.package_list')->with('package', $data_decode);
    }
    public function show()
    {
        error_log('--------------------------------------------------------------------------------------------');
        $data = file_get_contents('assets/json/package_list.json');
        error_log('-----------------------------------------------' . $data . '---------------------------------------------');
        $data_decode = json_decode($data, true);
        //print_r($data_decode);
        // error_log('-----------------------------------------------' . $data_decode . '---------------------------------------------');
        error_log('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=');

        //error_log($superAdmin_list);
        return view('Manager.package_edit')->with('package', $data_decode);
    }

    public function update(Request $req)
    {
        if (file_exists('assets/json/package_list.json')) {
            $current_data = file_get_contents('assets/json/package_list.json');
            $array_data = json_decode($current_data, true);
            unset($array_data);
            //print_r($array_data);
            $extra = array(
                's1' => $req->s1,
                's2' => $req->s2,
                's3' => $req->s3,
                's4' => $req->s4,
                's5' => $req->s5,
                's6' => $req->s6,
                'a1' => $req->a1,
                'a2' => $req->a2,
                'a3' => $req->a3,
                'a4' => $req->a4,
                'a5' => $req->a5,
                'a6' => $req->a6,
                'e1' => $req->e1,
                'e2' => $req->e2,
                'e3' => $req->e3,
                'e4' => $req->e4,
                'e5' => $req->e5,
                'e6' => $req->e6,
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
            print_r($final_data);
            error_log('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=');

            if (file_put_contents('assets/json/package_list.json', $final_data)) {
                // echo '<script type=text/javaScript> alert("Hospital added") ; </script>';
                $alert = array(
                    'messege' => ' Package updated Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('Manager.package')->with($alert);
            } else {
                echo '<script type=text/javaScript> alert("Not added") ; </script>';
            }
        } else {
            echo '<script type=text/javaScript> alert("JSON file not exists") ; </script>';
        }
    }*/
}
