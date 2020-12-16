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
        // return view('home.index', ['username'=> $req->session()->get('username')]);

        return view('superAdmin.index');
    }
    public function superAdmin_show()
    {
        $superAdmin_list = superAdmin::all();
        // error_log($superAdmin_list);
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
        $user_create = array();
        $user_create['type'] = $req->type;
        $user_create['username'] = $req->username;
        $user_create['password'] = Str::random(4);
        //error_log($user_create['password']);

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
                        $user_add = DB::table('adminuser')->insert($user_create);
                        if ($user_add) {
                            $alert = array(
                                'messege' => 'Super Admin inserted Successfully',
                                'alert-type' => 'success'
                            );
                            return Redirect()->Back()->with($alert);
                        } else {
                            $alert = array(
                                'messege' => 'User Insertion failed',
                                'alert-type' => 'error'
                            );
                            return Redirect()->Back()->with($alert);
                        }
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
}
