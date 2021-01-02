<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Marketchart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $val1= DB::table('leads')->where('status','potential')->get();
        $val2=DB::table('leads')->where('status','normal')->get();
        $val3=DB::table('customer')->get();
        return Chartisan::build()
            ->labels(['Normal'])
            ->dataset('POTENTIAL', [count($val1)])
            ->dataset('Normal', [count($val2)])
            ->dataset('CUSTOMER', [count($val3)]);
    }
}