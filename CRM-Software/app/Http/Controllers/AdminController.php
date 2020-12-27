<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\superAdminRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\superAdmin;


class AdminController extends Controller
{
    public function admin_create(superAdminRequest $req)
    {

        $admin_create = array();
        $admin_create['Name'] = $req->name;
        $admin_create['Mobile'] = $req->mobile;
        $admin_create['Email'] = $req->email;
        $admin_create['Gender'] = $req->gender;
        $admin_create['Address'] = $req->address;
        // $user_create = array();
        $admin_create['type'] = $req->type;
        $admin_create['username'] = $req->username;
        $admin_create['password'] = Str::random(4);
        error_log($admin_create['password']);
        error_log($admin_create['type']);

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
                    $admin_create['image'] = $image_url;
                    $admin_add = DB::table('supadmin')->insert($admin_create);
                    if ($admin_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => ' Admin inserted Successfully',
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
                            'messege' => ' Admin Insertion failed',
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

    public function show($id)
    {
        $admin = superAdmin::find($id);
        return view('superAdmin.admin_edit', $admin);
    }
}
