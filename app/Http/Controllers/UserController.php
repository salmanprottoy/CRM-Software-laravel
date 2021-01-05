<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Models\Manager;
use App\Models\user;
 

class UserController extends Controller
{
    public function user_create(UserRequest $req)
    {

        $user_create = array();
        $user_create['username'] = $req->username;
        $user_create['password'] = $req->password;
        $user_create['type']     = $req->type;
        $user_create['designation'] = $req->designation;
        $user_create['contactNumber'] = $req->contactNumber;
        $user_create['email'] = $req->email;
        $user_create['salary'] = $req->salary;
      
        // $user_create = array();
      

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
                    $user_create['image'] = $image_url;
                    $user_add = DB::table('user')->insert($user_create);
                    if ($user_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => ' Employee inserted Successfully',
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
                            'messege' => 'Employee Insertion failed',
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
        $user= user::find($id);
        return view('Manager.user_edit', $user);
    }

    public function  update($id, UserRequest $req)
    {
        $oldimage = $req->old_image;
        $user_create['username'] = $req->username;
        $user_create['password'] = $req->password;
        $user_create['type']     = $req->type;
        $user_create['designation'] = $req->designation;
        $user_create['contactNumber'] = $req->contactNumber;
        $user_create['email'] = $req->email;
        $user_create['salary'] = $req->salary;
      


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
                    $user_create['image'] = $image_url;
                    $user_add = DB::table('user')->where('id', $id)->update($user_create);
                    if ($user_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => 'Employee inserted Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('Manager.user')->with($alert);
                        // } else {
                        //     $alert = array(
                        //         'messege' => 'User Insertion failed',
                        //         'alert-type' => 'error'
                        //     );
                        //     return Redirect()->Back()->with($alert);
                        //}
                    } else {
                        $alert = array(
                            'messege' => ' Employee Insertion failed',
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
        } else {
            $user_add = DB::table('user')->where('id', $id)->update($user_create);
            if ($user_add) {
                // $user_add = DB::table('adminuser')->insert($user_create);
                // if ($user_add) {
                $alert = array(
                    'messege' => ' Employee updated Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('Manager.user')->with($alert);
            }
        }
    }
    public function destroy($id)
    {
        $data = DB::table('user')->where('id', $id)->first();
        $delete_image = $data->image;
       // unlink($delete_image);
        $delete_user = DB::table('user')->where('id', $id)->delete();
        if ($delete_user) {
            $alert = array(
                'messege' => ' Employee deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
