<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriberController extends Controller
{

    public function destroy($id)
    {
        // $data = DB::table('subscriber')->where('id', $id)->first();
        // $delete_image = $data->Company_logo;
        // unlink($delete_image);
        $delete_subscriber = DB::table('subscriber')->where('id', $id)->delete();
        if ($delete_subscriber) {
            $alert = array(
                'messege' => ' subscriber deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }


    public function block($id)
    {
        $subscriber_update = array();
        $subscriber_update['status'] = 'block';
        $block_subscriber = DB::table('subscriber')->where('id', $id)->update($subscriber_update);
        if ($block_subscriber) {
            $alert = array(
                'messege' => ' subscriber Blocked Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
    public function unblock($id)
    {
        $subscriber_update = array();
        $subscriber_update['status'] = 'unblock';
        $block_subscriber = DB::table('subscriber')->where('id', $id)->update($subscriber_update);
        if ($block_subscriber) {
            $alert = array(
                'messege' => ' subscriber Unblocked Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }
}
