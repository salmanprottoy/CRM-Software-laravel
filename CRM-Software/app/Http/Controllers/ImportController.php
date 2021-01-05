<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\leadsimport;
use App\Imports\customerimport;
use Maatwebsite\Excel\Facades\Excel;
class ImportController extends Controller
{
    public function import(Request $request,$table) 
    {
    	if($request->hasFile('file'))
    	{
    		if($table=='leads')
	        {
	        	Excel::import(new leadsimport, request()->file('file'));
	           
	        	return back();
	        }
	        else
	        {
	        	Excel::import(new customerimport, request()->file('file'));
	           
	        	return back();
	        }
    	}
    	else return back();
        
    }
}
