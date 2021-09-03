<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Facture;
use App\Models\Estimate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartController extends Controller
{
    public $days;
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
    // $date = Carbon::now()->subDays(7)->startOfDay();
    // $chat5 =
    // DB::table('facture')
    // ->where('facture.created_at','>=',$date)

    $facture = Facture::select(DB::raw("COUNT(*) as count"))
    ->whereYear('invoice_date',date('Y'))
    ->groupBy(DB::raw("Month(invoice_date)"))
    ->pluck('count');
    $months =  Facture::select(DB::raw("Month(invoice_date)as month"))
    ->whereYear('invoice_date',date('Y'))
    ->groupBy(DB::raw("Month(invoice_date)"))
    ->pluck('month');

    $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    foreach($months as $index =>$month)
    {
        $datas[$month] = $facture[$index];
    }
    $active_estimates = DB::table('estimates')
    ->where('status','=',1)
    ->count();
    $inactive_estimates = DB::table('estimates')
    ->where('status','<>',1)
    ->count();

    $total_estimates = DB::table('estimates')
    ->count();

    $amount_estimates = DB::table('estimates')
    ->where('status','=',1)
    ->sum('ttc');

    $users = User::all();

    $invoices = Facture::all();
    foreach($invoices as $invoice){
        $expiration = Carbon::parse($invoice->expiration_date);
        $current = Carbon::now();
        if($expiration)
        {
        $days = $current->diffInDays($expiration);
        }  
    }
    $paidinvoice= DB::table('factures')
    ->where('rest_to_pay','=','0')
    ->get();
    $unpaidinvoice =  DB::table('factures')
    ->where('rest_to_pay','>','0')
    ->get();
    return view('dashboard.index',compact('chart','chart2','chart3','chart4','datas','active_estimates','inactive_estimates','total_estimates','amount_estimates','users','invoices','days'));
    }
}
