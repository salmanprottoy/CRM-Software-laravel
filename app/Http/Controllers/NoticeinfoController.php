<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\NoticeinfoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Models\Manager;
use App\Models\noticeinfo;
 

class NoticeinfoController extends Controller
{
    public function noticeinfo_create(NoticeinfoRequest $req)
    {

        $noticeinfo_create = array();
        $noticeinfo_create['noticename'] = $req->noticename;
        $noticeinfo_create['creatorid'] = $req->creatorid;
        $noticeinfo_create['description'] = $req->description;
        $noticeinfo_create['noticedate'] = $req->noticedate;
        $noticeinfo_create['expiredate'] = $req->expiredate;
       
        
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
                    $noticeinfo_create['image'] = $image_url;
                    $noticeinfo_add = DB::table('noticeinfo')->insert($noticeinfo_create);
                    if ($noticeinfo_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => ' Notice inserted Successfully',
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
                            'messege' => 'Notice Insertion failed',
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
        $noticeinfo= noticeinfo::find($id);
        return view('Manager.noticeinfo_edit', $noticeinfo);
    }

    public function  update($id, NoticeinfoRequest $req)
    {
        $oldimage = $req->old_image;
        $noticeinfo_create['noticename'] = $req->noticename;
        $noticeinfo_create['creatorid'] = $req->creatorid;
        $noticeinfo_create['description'] = $req->description;
        $noticeinfo_create['noticedate'] = $req->noticedate;
        $noticeinfo_create['expiredate'] = $req->expiredate;



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
                    $noticeinfo_create['image'] = $image_url;
                    $noticeinfo_add = DB::table('noticeinfo')->where('id', $id)->update($noticeinfo_create);
                    if ($noticeinfo_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => 'Notice inserted Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('Manager.noticeinfo')->with($alert);
                        // } else {
                        //     $alert = array(
                        //         'messege' => 'User Insertion failed',
                        //         'alert-type' => 'error'
                        //     );
                        //     return Redirect()->Back()->with($alert);
                        //}
                    } else {
                        $alert = array(
                            'messege' => 'Notice Insertion failed',
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
            $noticeinfo_add = DB::table('noticeinfo')->where('id', $id)->update($noticeinfo_create);
            if ($noticeinfo_add) {
                // $user_add = DB::table('adminuser')->insert($user_create);
                // if ($user_add) {
                $alert = array(
                    'messege' => ' Notice updated Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('Manager.noticeinfo')->with($alert);
            }
        }
    }
    public function destroy($id)
    {
        $data = DB::table('noticeinfo')->where('id', $id)->first();
        $delete_image = $data->image;
       // unlink($delete_image);
        $delete_noticeinfo = DB::table('noticeinfo')->where('id', $id)->delete();
        if ($delete_noticeinfo) {
            $alert = array(
                'messege' => ' Notice deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
