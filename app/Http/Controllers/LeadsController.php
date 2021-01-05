<?php

namespace App\Http\Controllers;

use App\Models\leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadsController extends Controller
{

    public function destroy($id)
    {
        // $data = DB::table('subscriber')->where('id', $id)->first();
        // $delete_image = $data->Company_logo;
        // unlink($delete_image);
        $delete_leads = DB::table('leads')->where('id', $id)->delete();
        if ($delete_leads) {
            $alert = array(
                'messege' => ' leads deleted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($alert);
        }
    }

    
}
