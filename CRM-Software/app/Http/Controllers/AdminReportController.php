<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use PDF;

class AdminReportController extends Controller
{


    public function download($name)
    {
        if ($name == 'income') {
            $orders = Order::select(DB::raw('year(transaction_date) as Year'), DB::raw('month(transaction_date) as Month'), DB::raw('sum(amount) as Income'))
                ->groupBy(DB::raw('year(transaction_date)'), DB::raw('month(transaction_date)'))
                ->get();
            $pdf = PDF::loadview('superAdmin.income', compact('orders'));
            return $pdf->download('income.pdf');
        } elseif ($name == 'top10subs') {
            $top10subs = Order::select('name', DB::raw('sum(amount) as Income'))
                ->groupBy('name')
                ->orderBy('Income', 'desc')
                ->get();
            $pdf = PDF::loadview('superAdmin.top10subs', compact('top10subs'));
            return $pdf->download('top10subs.pdf');
        }
    }
}
