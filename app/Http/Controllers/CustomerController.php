<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Models\Manager;
use App\Models\customer;
 

class CustomerController extends Controller
{
    public function customer_create(CustomerRequest $req)
    {

        $customer_create = array();
        $customer_create['customerName'] = $req->customerName;
        $customer_create['customerContactNumber'] = $req->customerContactNumber;
        $customer_create['customerAdress'] = $req->customerAdress;
        $customer_create['customerEmail'] = $req->customerEmail;
        $customer_create['customerStatus'] = $req->customerStatus;
        // $user_create = array();
        $customer_create['customerGender'] = $req->customerGender;

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
                    $customer_create['image'] = $image_url;
                    $customer_add = DB::table('customer')->insert($customer_create);
                    if ($customer_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => ' Customer inserted Successfully',
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
                            'messege' => 'Customer Insertion failed',
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
        $customer= customer::find($id);
        return view('Manager.customer_edit', $customer);
    }

 /* public function search(Request $req)
  {
        return view('customer_search');
  }*/



    public function  update($id, CustomerRequest $req)
    {
        $oldimage = $req->old_image;
        $customer_create['customerName'] = $req->customerName;
        $customer_create['customerContactNumber'] = $req->customerContactNumber;
        $customer_create['customerAdress'] = $req->customerAdress;
        $customer_create['customerEmail'] = $req->customerEmail;
        $customer_create['customerStatus'] = $req->customerStatus;
        // $user_create = array();
        $customer_create['customerGender'] = $req->customerGender;


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
                    $customer_create['image'] = $image_url;
                    $customer_add = DB::table('customer')->where('id', $id)->update($customer_create);
                    if ($customer_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => 'Customer inserted Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('Manager.customer')->with($alert);
                        // } else {
                        //     $alert = array(
                        //         'messege' => 'User Insertion failed',
                        //         'alert-type' => 'error'
                        //     );
                        //     return Redirect()->Back()->with($alert);
                        //}
                    } else {
                        $alert = array(
                            'messege' => ' Customer Insertion failed',
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
            $customer_add = DB::table('customer')->where('id', $id)->update($customer_create);
            if ($customer_add) {
                // $user_add = DB::table('adminuser')->insert($user_create);
                // if ($user_add) {
                $alert = array(
                    'messege' => ' Customer updated Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('Manager.customer')->with($alert);
            }
        }
    }
    public function destroy($id)
    {
        $data = DB::table('customer')->where('id', $id)->first();
        $delete_image = $data->image;
       // unlink($delete_image);
        $delete_customer = DB::table('customer')->where('id', $id)->delete();
        if ($delete_customer) {
            $alert = array(
                'messege' => ' Customer deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
