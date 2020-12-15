<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('superAdmin.superAdmin_list')->with('superAdmin', $superAdmin_list);
    }

    public function superAdmin_create(Request $req)
    {
        error_log('Some ');
        $superAdmin_create = array();
        $superAdmin_create['Name'] = $req->name;
        $superAdmin_create['Mobile'] = $req->mobile;
        $superAdmin_create['Email'] = $req->email;
        $superAdmin_create['Gender'] = $req->gender;
        $superAdmin_create['Address'] = $req->address;

        $image = $req->file('image');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name . '.' . $image_ext;
            $upload_path = 'assets/uploads/';
            $image_url = $upload_path . $image_fullname;
            $image_move = $image->move($upload_path, $image_fullname);

            $superAdmin_create['image'] = $image_url;
            $superAdmin_add = DB::table('supadmin')->insert($superAdmin_create);
            $alert = array(
                'messege' => 'Super Admin inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->Back()->with($alert);
        }
    }
}
