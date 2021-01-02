<?php

namespace App\Http\Controllers;

use App\Models\Markethome;
use Illuminate\Http\Request;
use App\Http\Requests\infoCheck;
use Illuminate\Support\Facades\DB;
class MarkethomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        
        return view('markethome.index',['username'=> $req->session()->get('username')]);
        
    }
    public function profile(Request $req)
    {
        $user = [
            'username'=> $req->session()->get('username'),
            'phone'=> $req->session()->get('phone'),
            'email'=> $req->session()->get('email'),
            'designation'=> $req->session()->get('designation')
        ];
        return view('markethome.profile',$user);
    }
    public function profileupdate(Request $req,infoCheck $info)
    {
        $affected = DB::table('user')
              ->where('id', $req->session()->get('id'))
              ->update(['username' => $info->username,
                        'designation'=> $info->designation,
                        'email'=> $info->email,
                        'contactNumber'=> $info->phone
                      ]);
              $req->session()->put('username',$info->username);
              $req->session()->put('designation',$info->designation);
              $req->session()->put('email',$info->email);
              $req->session()->put('phone',$info->phone);
        return redirect()->route('markethome.profile');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Markethome  $markethome
     * @return \Illuminate\Http\Response
     */
    public function show($table, Request $req)
    {
        if($table=="leads")
        {
            $temp = DB::table('leads')->get();
            return view('markethome.leadslist')->with('userlist', $temp)->with('username', $req->session()->get('username'));
        }
        else if($table=='customer')
        {
            $temp = DB::table('customer')->get();
            return view('markethome.customerlist')->with('userlist', $temp)->with('username', $req->session()->get('username'));
        }
        else
        {
            $temp = DB::table('campaign')->get();
            return view('campaigns.camp')->with('userlist', $temp)->with('username', $req->session()->get('username'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Markethome  $markethome
     * @return \Illuminate\Http\Response
     */
    public function edit(Markethome $markethome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Markethome  $markethome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Markethome $markethome)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Markethome  $markethome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Markethome $markethome)
    {
        //
    }
}
