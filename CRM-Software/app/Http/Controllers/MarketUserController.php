<?php

namespace App\Http\Controllers;

use App\Models\marketUser;
use App\Models\marketCustomer;
use App\Mail\offermail;
use App\Http\Requests\userinfoCheck;
use App\Http\Requests\createinfocheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use PDF;
class MarketUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function sendmails($table,$id)
    {
      if($table=='normal')
      {
        $data = marketUser::where('status','normal')->get();
        $msg= DB::table('campaign')->where('id', $id)->get();

        foreach ($data as $val) {
          Mail::to($val->email)->send(new offermail($msg[0]->template));
        }
        return back();
      }
      else if($table=='Potential')
      {
        $data = marketUser::where('status','Potential')->get();
        $msg= DB::table('campaign')->where('id', $id)->get();

        foreach ($data as $val) {
          Mail::to($val->email)->send(new offermail($msg[0]->template));
        }
        return back();
      }
      else
      {
        $data = marketCustomer::get();
        $msg= DB::table('campaign')->where('id', $id)->get();

        foreach ($data as $val) {
          Mail::to($val->email)->send(new offermail($msg[0]->template));
        }
        return back();
      }

    }
    public function showinfo($table,$id,Request $req)
    {

        if($table=="leads")
        {
            $std = marketUser::find($id);
            return view('marketuser.profile', $std)->with('username', $req->session()->get('username'));
        }
        else
        {
            $std = marketCustomer::find($id);
            $user=[
                'name'=>$std->customerName,
                'phone'=>$std->customerContactNumber,
                'gender'=>$std->customerAdress,
                'email'=>$std->customerEmail,
                'address'=>$std->customerAdress,
                'gender'=>$std->customerGender
            ];
            return view('marketuser.profile', $user)->with('username', $req->session()->get('username'));
        }
    }
    public function updateinfo($table,$id,Request $req,userinfoCheck $check)
    {
        if($table=="leads")
        {
           $client = new Client();
        // $temp = $req->get('user_email');
        // $req->session()->put('checkemail', $temp);
        $response = $client->request('POST', 'http://localhost:3000/update/store',['form_params' => [
                'id' => $id,
                'name'=> $req->username,
                'email'=>$req->email,
                'gender'=>$req->gender,
                'status'=>$req->status,
                'phone'=>$req->phone,
                'address'=>$req->address
        ]]);
        $response->getBody();
            // $std = marketUser::where('id',$id)->update([

            //     'name'=> $req->username,
            //     'email'=>$req->email,
            //     'gender'=>$req->gender,
            //     'status'=>$req->status,
            //     'phone'=>$req->phone,
            //     'address'=>$req->address
            // ]);
            
        }
        else
        {
            $std = marketCustomer::where('id',$id)->update([

                'customerName'=> $req->username,
                'customerEmail'=>$req->email,
                'customerGender'=>$req->gender,
                'customerStatus'=>$req->status,
                'customerContactNumber'=>$req->phone
            ]);
        }
        return redirect()->route('marketuser.profile',[$table,$id]);
    }
    public function deleteuser($table,$id)
    {
        if($table=='leads')
        {
            marketUser::where('id', $id)->delete();
            return redirect()->route('markethome.show','leads');
        }
        else
        {
            marketCustomer::where('id', $id)->delete();
            return redirect()->route('markethome.show','customer');
        }
    }
    public function upgradestatus($id)
    {
        
        $std = marketUser::find($id);
        if($std->status=='normal')
        {
            marketUser::where('id', $id)->update([
                'status'=>'Potential'
            ]);
            
            return redirect()->route('markethome.show','leads');
        }
        else
        {
            marketUser::where('id', $id)->delete();
            $temp=marketCustomer::create([
                'customerName'=> $std->name,
                'customerEmail'=> $std->email,
                'customerContactNumber'=> $std->phone,
                'customerAdress'=> $std->address,
                'customerStatus'=>'Customer',
                'customerGender'=> $std->gender
            ]);
            return redirect()->route('markethome.show','customer');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        return view('marketuser.create')->with('username', $req->session()->get('username'));
    }
    public function insert(createinfocheck $req)
    {
        marketUser::create([
                'name'=> $req->username,
                'email'=> $req->email,
                'phone'=> $req->phone,
                'gender'=> $req->gender,
                'status'=> $req->status,
                'address'=> $req->address
            ]);
            return redirect()->route('markethome.show','leads');
    }
    public function search(Request $request,$table)
    {
        if($table=='leads')
        {
           $data =$this->searchleads($request);
           
           echo json_encode($data);
        }
        else
        {
            $data =$this->searchcustomer($request);
           
           echo json_encode($data);
        }
     
    }
    public function searchcustomer($request)
    {
          if($request->ajax())
             {
              $output = '';
              $query = $request->get('query');
              if($query != '')
              {
               $data = DB::table('customer')
                 ->where('customerName', 'like', '%'.$query.'%')
                 ->orWhere('customerAdress', 'like', '%'.$query.'%')
                 ->orWhere('customerEmail', 'like', '%'.$query.'%')
                 ->orWhere('customerContactNumber', 'like', '%'.$query.'%')
                 ->orWhere('customerGender', 'like', '%'.$query.'%')
                 ->get();
                 
              }
              else
              {
               $data = DB::table('customer')
                 ->get();
              }
              $total_row = $data->count();
              if($total_row > 0)
              {
               foreach($data as $row)
               {
                $output .= "
                <tr>
                 <td>".$row->id."</td>
                 <td>".$row->customerName."</td>
                 <td>".$row->customerEmail."</td>
                 <td>".$row->customerContactNumber."</td>
                 <td>".$row->customerGender."</td>";
                 $output.="<td><span class='badge badge-danger'>".$row->customerStatus."</span></td>";
                 $output.="<td><a class='btn btn-primary' href='/marketuser/showinfo/customer/".$row->id."'>Profile</a></td>";
                 $output.="<td><a class='btn btn-primary' href='/marketuser/delete/customer/".$row->id."'>Delete</a></td></tr>";
                
               }
              }
              else
              {
               $output = '
               <tr>
                <td align="center" colspan="5">No Data Found</td>
               </tr>
               ';
              }
              $data = array(
               'table_data'  => $output,
               'total_data'  => $total_row
              );
              return $data;
    }
}
    public function searchleads($request)
    {
         if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('leads')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('phone', 'like', '%'.$query.'%')
         ->orWhere('gender', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('leads')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= "
        <tr>
         <td>".$row->id."</td>
         <td>".$row->name."</td>
         <td>".$row->email."</td>
         <td>".$row->phone."</td>
         <td>".$row->gender."</td>";
         if($row->status=="Potential") $output.="<td><span class='badge badge-success'>".$row->status."</span></td>";
         else $output.="<td><span class='badge badge-secondary'>".$row->status."</span></td>";
         $output.="<td><a class='btn btn-primary' href='/marketuser/showinfo/leads/".$row->id."'>Profile</a></td>";
         $output.="<td><a class='btn btn-primary' href='/marketuser/delete/leads/".$row->id."'>Delete</a></td>";
         $output.="<td><a class='btn btn-primary' href='/marketuser/upgradestatus/".$row->id."'>Upgrade</a></td></tr>";
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      return $data;
      
     }
    }
    public function duplicate(Request $req)
    {
      
        $client = new Client();
        // $temp = $req->get('user_email');
        // $req->session()->put('checkemail', $temp);
        $response = $client->request('POST', 'http://localhost:3000/clients/search',['form_params' => [
        'user_email' => $req->get('user_email')
    ]]);
        return $response->getBody();
      
    }
    public function loadpdf(Request $req,$table)
    {
        if($table=='leads')
        {
            $userlist=marketUser::all();
            $count1=count(marketCustomer::all());
            $count2=count($userlist);
            $count1+=$count2;
            $count= floor(($count2*100)/$count1);


            //return view('marketpdf.leadspdf')->with('userlist', $userlist);
            $pdf = PDF::loadView('marketpdf.leadspdf',compact(['userlist','count']));
            return $pdf->download('leads.pdf');
        }
        else
        {
             $userlist=marketCustomer::all();
            $count1=count(marketUser::all());
            $count2=count($userlist);
            $count1+=$count2;
            $count= floor(($count2*100)/$count1);
            $pdf = PDF::loadView('marketpdf.customerpdf',compact(['userlist','count']));
            return $pdf->download('customer.pdf');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createinfocheck $req)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marketUser  $marketUser
     * @return \Illuminate\Http\Response
     */
    public function show(marketUser $marketUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marketUser  $marketUser
     * @return \Illuminate\Http\Response
     */
    public function edit(marketUser $marketUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marketUser  $marketUser
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marketUser  $marketUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(marketUser $marketUser)
    {
        //
    }
}
