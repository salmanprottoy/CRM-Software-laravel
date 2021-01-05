<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
     $buyer_data = $this->get_buyer_data();
     return view('dynamic_pdf')->with('buyer_data', $buyer_data);
    }

    function get_buyer_data()
    {
     $buyer_data = DB::table('buyer')
         ->limit(10)
         ->get();
     return $buyer_data;
    }
  
    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_buyer_data_to_html());
     return $pdf->stream();
    }

    function convert_buyer_data_to_html()
    {
     $buyer_data = $this->get_buyer_data();
     $output = '
     <h3 align="center">Buyer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">buyerName</th>
    <th style="border: 1px solid; padding:12px;" width="30%">buyerAddress</th>
    <th style="border: 1px solid; padding:12px;" width="15%">buyerContactNumber</th>
    <th style="border: 1px solid; padding:12px;" width="15%">productCode</th>
    <th style="border: 1px solid; padding:12px;" width="20%">productQuantity</th>
   </tr>
     ';  
     foreach($buyer_data as $buyer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$buyer->buyerName.'</td>
       <td style="border: 1px solid; padding:12px;">'.$buyer->buyerAddress.'</td>
       <td style="border: 1px solid; padding:12px;">'.$buyer->buyerContactNumber.'</td>
       <td style="border: 1px solid; padding:12px;">'.$buyer->productCode.'</td>
       <td style="border: 1px solid; padding:12px;">'.$buyer->productQuantity.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
