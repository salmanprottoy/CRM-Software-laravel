<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use Illuminate\Support\Facades\DB;

use PDF;
class chartsController extends Controller
{
    public function index($type,Request $req)
    {
    	if($type=='bars') 
    	{
    		return view('marketcharts.charts')->with('username', $req->session()->get('username'));
    	}
    	else
    	{
    		$array= $this->getvalues();
		     return view('marketcharts.linechart')->with('gender', json_encode($array))->with('username', $req->session()->get('username'));
		}
		    	
    }
    public function downloadcharts($table)
    {
    	if($table=='line')
    	{
    		$gender= $this->getvalues();
    		// $render = view('marketcharts.linepdf')->with('gender',json_encode($array))->render();
	     //    $pdf = new Pdf;
	     //    $pdf->addPage($render);
	     //    $pdf->setOptions(['javascript-delay' => 5000]);
	     //    $pdf->saveAs(public_path('report.pdf'));
	    
	     //    return response()->download(public_path('report.pdf'));
    		$pdf = PDF::loadView('marketcharts.linepdf',compact('gender'));
            return $pdf->download('itsolutionstuff.pdf');
    	}
    }
    public function getvalues()
    {
    	$data = DB::table('leads')
		       ->select(
		        DB::raw('status as status'),
		        DB::raw('count(*) as number'))
		       ->groupBy('status')
		       ->get();
		    $data2 = DB::table('customer')
		       ->select(
		        DB::raw('customerStatus as status'),
		        DB::raw('count(*) as number'))
		       ->groupBy('customerStatus')
		       ->get();
		     $array[] = ['status','number'];
		     $i=1;
		     foreach($data as $key => $value)
		     {
		      $array[$i] = [$value->status, $value->number];
		      $i++;
		     }
		     foreach($data2 as $key => $value)
		     {
		      $array[$i] = [$value->status, $value->number];
		      $i++;
		     }
		     return $array;
    }
}
