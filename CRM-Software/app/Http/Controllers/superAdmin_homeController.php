<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\superAdmin;


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

        // $superAdmin_list = superAdmin::all();
        $superAdmin_list = superAdmin::where('type', 'Super Admin')->get();
        //error_log($superAdmin_list);
        return view('superAdmin.superAdmin_list')->with('superAdmin', $superAdmin_list);
    }

    public function superAdmin_create(Request $req)
    {

        $superAdmin_create = array();
        $superAdmin_create['Name'] = $req->name;
        $superAdmin_create['Mobile'] = $req->mobile;
        $superAdmin_create['Email'] = $req->email;
        $superAdmin_create['Gender'] = $req->gender;
        $superAdmin_create['Address'] = $req->address;
        // $user_create = array();
        $superAdmin_create['type'] = $req->type;
        $superAdmin_create['username'] = $req->username;
        $superAdmin_create['password'] = Str::random(4);
        //error_log($superAdmin_create['password']);

        $image = $req->file('image');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $image_ext = strtolower($image->getClientOriginalExtension());
            $fileextstored = array('png', 'jpg', 'jpeg');
            if (in_array($image_ext, $fileextstored)) {
                $image_fullname = $image_name . '.' . $image_ext;
                $upload_path = 'assets/uploads/';
                $image_url = $upload_path . $image_fullname;
                $image_move = $image->move($upload_path, $image_fullname);
                if ($image_move) {
                    $superAdmin_create['image'] = $image_url;
                    $superAdmin_add = DB::table('supadmin')->insert($superAdmin_create);
                    if ($superAdmin_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => 'Super Admin inserted Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->Back()->with($alert);
                        // } else {
                        //     $alert = array(
                        //         'messege' => 'User Insertion failed',
                        //         'alert-type' => 'error'
                        //     );
                        //     return Redirect()->Back()->with($alert);
                        //}
                    } else {
                        $alert = array(
                            'messege' => 'Super Admin Insertion failed',
                            'alert-type' => 'error'
                        );
                        return Redirect()->Back()->with($alert);
                    }
                } else {
                    $alert = array(
                        'messege' => 'Image does not moved into assets',
                        'alert-type' => 'warning'
                    );
                    return Redirect()->Back()->with($alert);
                }
            } else {
                $alert = array(
                    'messege' => 'Image Extension does not match',
                    'alert-type' => 'warning'
                );
                return Redirect()->Back()->with($alert);
            }
        }
    }
    public function search(Request $req)
    {
        if ($req->ajax()) {
            $value = $req->get('search');
            // error_log($value);
            $found = DB::table('supadmin')->where('username', $value)->get();
            //    error_log($found);
            // $total_row = $found->count();
            // if($total_row > 0){

            // }
            return response()->json($found);
        } else {
            return Redirect()->Back();
        }

        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        //error_log($req->get('search'));
        // $posts = superAdmin::where('username', $req->get('search'))->get();
        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        // //return json_encode($posts);
        // return response()->json($posts);
        // $search = $req->username;
        //error_log($posts);
        // $found = superAdmin::where('username', $search)->get();
        // error_log($found);
        // return json_encode($found);
    }
}
