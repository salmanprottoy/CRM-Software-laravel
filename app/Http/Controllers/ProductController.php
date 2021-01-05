<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Models\Manager;
use App\Models\product;
use PDF;
 

class ProductController extends Controller
{
    public function product_create(ProductRequest $req)
    {

        $product_create = array();
        $product_create['productCode'] = $req->productCode;
        $product_create['productName'] = $req->productName;
        $product_create['productVendor'] = $req->productVendor;
        $product_create['quantityInStock'] = $req->quantityInStock;
        $product_create['buyPrice'] = $req->buyPrice;
        $product_create['sellPrice'] = $req->sellPrice;
        $product_create['productDescription'] = $req->productDescription;

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
                    $product_create['image'] = $image_url;
                    $product_add = DB::table('product')->insert($product_create);
                    if ($product_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => ' Product inserted Successfully',
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
                            'messege' => 'Product Insertion failed',
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
        $product= product::find($id);
        return view('Manager.product_edit', $product);
    }

    public function downloadPDF()
    {
      
        $product=product::find($id);
        $pdf=PDF::loadView('pdf',$product);
        return $pdf->download('product.pdf');


    }
    public function  update($id, ProductRequest $req)
    {
        $oldimage = $req->old_image;
        $product_create['productCode'] = $req->productCode;
        $product_create['productName'] = $req->productName;
        $product_create['productVendor'] = $req->productVendor;
        $product_create['quantityInStock'] = $req->quantityInStock;
        $product_create['buyPrice'] = $req->buyPrice;
        $product_create['sellPrice'] = $req->sellPrice;
        $product_create['productDescription'] = $req->productDescription;



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
                    $product_create['image'] = $image_url;
                    $product_add = DB::table('product')->where('id', $id)->update($product_create);
                    if ($product_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => 'Product inserted Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('Manager.product')->with($alert);
                        // } else {
                        //     $alert = array(
                        //         'messege' => 'User Insertion failed',
                        //         'alert-type' => 'error'
                        //     );
                        //     return Redirect()->Back()->with($alert);
                        //}
                    } else {
                        $alert = array(
                            'messege' => 'Product Insertion failed',
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
            $product_add = DB::table('product')->where('id', $id)->update($product_create);
            if ($product_add) {
                // $user_add = DB::table('adminuser')->insert($user_create);
                // if ($user_add) {
                $alert = array(
                    'messege' => ' Product updated Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('Manager.product')->with($alert);
            }
        }
    }
    public function destroy($id)
    {
        $data = DB::table('product')->where('id', $id)->first();
        $delete_image = $data->image;
       // unlink($delete_image);
        $delete_product = DB::table('product')->where('id', $id)->delete();
        if ($delete_product) {
            $alert = array(
                'messege' => ' Product deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
