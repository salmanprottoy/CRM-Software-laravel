<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
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
        return view('superAdmin.package_edit')->with('package', $data_decode);
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
                return Redirect()->route('superAdmin.package')->with($alert);
            } else {
                echo '<script type=text/javaScript> alert("Not added") ; </script>';
            }
        } else {
            echo '<script type=text/javaScript> alert("JSON file not exists") ; </script>';
        }
    }
}
