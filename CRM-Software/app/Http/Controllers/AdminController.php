<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\superAdminRequest;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\superAdmin;
use GuzzleHttp\Client;


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

    public function  update($id, Request $req)
    {
        $oldimage = $req->old_image;
        $admin_create = array();
        $admin_create['pid'] = $id;
        $admin_create['Name'] = $req->name;
        $admin_create['Mobile'] = $req->mobile;
        $admin_create['Email'] = $req->email;
        $admin_create['Gender'] = $req->gender;
        $admin_create['Address'] = $req->address;
        $admin_create['vote'] = 0;


        $image = $req->file('image');
        if ($image) {
            //unlink($oldimage);
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
                    $admin_add = DB::table('admin_pending_log')->insert($admin_create);
                }
            }
        } else {
            $admin_create['image'] = $oldimage;
            $admin_add = DB::table('admin_pending_log')->insert($admin_create);
        }
        $client = new Client();
        $response = $client->request('POST', 'http://localhost:4000/home/pending_incoming', [
            'form_params' => [
                'id' => $id,


                'name' => $req->name,
                'phone' => $req->mobile,
                'email' => $req->email,
                'gender' => $req->gender,
                'address' => $req->address,
                'vote' => 0,
                'create_time' => date('Y-m-d H:i:s'),
                'created_by' => $req->session()->get('username'),
                'image' => $oldimage
            ]
        ]);



        if ($response->getStatusCode() == 200) {
            $alert = array(
                'messege' => ' Admin will be inserted after validation',
                'alert-type' => 'info'
            );
            return Redirect()->route('superAdmin.admin')->with($alert);
        }
    }
    public function destroy($id)
    {
        $data = DB::table('supadmin')->where('id', $id)->first();
        $delete_image = $data->image;
        unlink($delete_image);
        $delete_admin = DB::table('supadmin')->where('id', $id)->delete();
        if ($delete_admin) {
            $alert = array(
                'messege' => ' Admin deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
