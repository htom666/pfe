<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartController extends Controller
{
    public function index()
    {
        $chart = (new LarapexChart)->pieChart()
    ->setTitle('Invoice Summary')
    ->addData([
        DB::table('factures')
        ->select('ttc')
        ->where('rest_to_pay', '=',0)
        ->sum('ttc'),
        DB::table('factures')
        ->select('ttc')
        ->where('rest_to_pay','>',0)
        ->sum('ttc'),
    ])
    ->setColors(['#ffc63b', '#ff6384'])
    ->setLabels(['Payed Invoices Amount', 'Unpayed Invoices Amount']);

    $chart2 = (new LarapexChart)->pieChart()
    ->setTitle('Invoice Summary')
    ->addData([
        DB::table('factures')
        ->select('ttc')
        ->where('rest_to_pay', '=',0)
        ->count(),
        DB::table('factures')
        ->select('ttc')
        ->where('rest_to_pay','>',0)
        ->count()
    ])
    ->setColors(['#ffc63b', '#ff6384'])
    ->setLabels(['Payed Invoices Amount', 'Unpayed Invoices Amount']);


    $chart3 =
        DB::table('discounts')
        ->select('discount')
        ->whereDate('created_at',Carbon::today())
        ->sum('discount');
    $chart4 = 
    DB::table('discounts')
    ->select('discount')
    ->whereMonth('created_at',Carbon::today()->month)
    ->sum('discount');
    
    return view('dashboard.index',compact('chart','chart2','chart3','chart4'));
    }
}
