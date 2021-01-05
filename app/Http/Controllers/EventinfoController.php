<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\EventinfoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Models\Manager;
use App\Models\eventinfo;
 

class EventinfoController extends Controller
{
    public function eventinfo_create(EventinfoRequest $req)
    {

        $eventinfo_create = array();
        $eventinfo_create['eventname'] = $req->eventname;
        $eventinfo_create['eventdate'] = $req->eventdate;
        $eventinfo_create['expiredate'] = $req->expiredate;
        $eventinfo_create['eventdescription'] = $req->eventdescription;
        $eventinfo_create['eventstatus'] = $req->eventstatus;
        $eventinfo_create['audience'] = $req->audience;
        

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
                    $eventinfo_create['image'] = $image_url;
                    $eventinfo_add = DB::table('eventinfo')->insert($eventinfo_create);
                    if ($eventinfo_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => ' Campaign inserted Successfully',
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
                            'messege' => 'Campaign Insertion failed',
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
        $eventinfo= eventinfo::find($id);
        return view('Manager.eventinfo_edit', $eventinfo);
    }

    public function  update($id, EventinfoRequest $req)
    {
        $oldimage = $req->old_image;
        $eventinfo_create['eventname'] = $req->eventname;
        $eventinfo_create['eventdate'] = $req->eventdate;
        $eventinfo_create['expiredate'] = $req->expiredate;
        $eventinfo_create['eventdescription'] = $req->eventdescription;
        $eventinfo_create['eventstatus'] = $req->eventstatus;
        $eventinfo_create['audience'] = $req->audience;
        



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
                    $eventinfo_create['image'] = $image_url;
                    $eventinfo_add = DB::table('eventinfo')->where('id', $id)->update($eventinfo_create);
                    if ($eventinfo_add) {
                        // $user_add = DB::table('adminuser')->insert($user_create);
                        // if ($user_add) {
                        $alert = array(
                            'messege' => 'Campaign inserted Successfully',
                            'alert-type' => 'success'
                        );
                        return Redirect()->route('Manager.eventinfo')->with($alert);
                        // } else {
                        //     $alert = array(
                        //         'messege' => 'User Insertion failed',
                        //         'alert-type' => 'error'
                        //     );
                        //     return Redirect()->Back()->with($alert);
                        //}
                    } else {
                        $alert = array(
                            'messege' => 'Campaign Insertion failed',
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
            $eventinfo_add = DB::table('eventinfo')->where('id', $id)->update($eventinfo_create);
            if ($eventinfo_add) {
                // $user_add = DB::table('adminuser')->insert($user_create);
                // if ($user_add) {
                $alert = array(
                    'messege' => ' Campaign updated Successfully',
                    'alert-type' => 'success'
                );
                return Redirect()->route('Manager.eventinfo')->with($alert);
            }
        }
    }
    public function destroy($id)
    {
        $data = DB::table('eventinfo')->where('id', $id)->first();
        $delete_image = $data->image;
       // unlink($delete_image);
        $delete_eventinfo = DB::table('eventinfo')->where('id', $id)->delete();
        if ($delete_eventinfo) {
            $alert = array(
                'messege' => ' Campaign deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
