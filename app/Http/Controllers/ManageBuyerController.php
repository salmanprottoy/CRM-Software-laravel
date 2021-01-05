<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\BuyerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Models\Manager;
use App\Models\buyer;
 

class ManageBuyerController extends Controller
{
    public function buyer_create(BuyerRequest $req)
    {

        $buyer_create = array();
        $buyer_create['buyerName'] = $req->buyerName;
        $buyer_create['buyerAddress'] = $req->buyerAddress;
        $buyer_create['buyerContactNumber'] = $req->buyerContactNumber;
        $buyer_create['productCode'] = $req->productCode;
        $buyer_create['productQuantity'] = $req->productQuantity;
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
                    $buyer_create['image'] = $image_url;
                    $buyer_add = DB::table('buyer')->insert($buyer_create);
                    if ($buyer_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => ' Buyer inserted Successfully',
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
                            'messege' => 'Buyer Insertion failed',
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
        $buyer= buyer::find($id);
        return view('Manager.buyer_edit', $buyer);
    }

 /* public function search(Request $req)
  {
        return view('customer_search');
  }*/



    public function  update($id, BuyerRequest $req)
    {
        $oldimage = $req->old_image;
        $buyer_create['buyerName'] = $req->buyerName;
        $buyer_create['buyerAddress'] = $req->buyerAddress;
        $buyer_create['buyerContactNumber'] = $req->buyerContactNumber;
        $buyer_create['productCode'] = $req->productCode;
        $buyer_create['productQuantity'] = $req->productQuantity;

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
                    $buyer_create['image'] = $image_url;
                    $buyer_add = DB::table('buyer')->where('id', $id)->update($buyer_create);
                    if ($buyer_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => 'Buyer inserted Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('Manager.buyer')->with($alert);
                        // } else {
                        //     $alert = array(
                        //         'messege' => 'User Insertion failed',
                        //         'alert-type' => 'error'
                        //     );
                        //     return Redirect()->Back()->with($alert);
                        //}
                    } else {
                        $alert = array(
                            'messege' => ' Buyer Insertion failed',
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
            $buyer_add = DB::table('buyer')->where('id', $id)->update($buyer_create);
            if ($buyer_add) {
                // $user_add = DB::table('adminuser')->insert($user_create);
                // if ($user_add) {
                $alert = array(
                    'messege' => ' Buyer updated Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('Manager.buyer')->with($alert);
            }
        }
    }
    public function destroy($id)
    {
        $data = DB::table('buyer')->where('id', $id)->first();
        $delete_image = $data->image;
       // unlink($delete_image);
        $delete_buyer = DB::table('buyer')->where('id', $id)->delete();
        if ($delete_buyer) {
            $alert = array(
                'messege' => ' Buyer deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
