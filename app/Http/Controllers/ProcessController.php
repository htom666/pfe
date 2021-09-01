<?php

namespace App\Http\Controllers;

use App\Models\Extracted;
use App\Models\ExtractedInvoice;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ProcessController extends Controller
{
    public function index()
    {
        $i = 1;
        $invoices= Extracted::all();
        if($invoices){
        return view('process.process',compact('invoices','i'));
        }
    }


    public function edit($id){

        $invoice=Extracted::find($id);
        return view('process.edit',compact('invoice'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $invoice = Extracted::where('id',$id)
        ->first();
        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->address = $request->address;
        $invoice->dest = $request->dest;
        $invoice->amout = $request->amount;
        $invoice->product = $request->products;
        $invoice->save();
       return back();
    }


    public function destroy($id)
    {

    }
    // {
    //     $delete =Extracted::find($id)->delete();
    //     if($delete == 1){
    //         return back()->with('success','product deleted successfully');

    //     }
    //     return back();
    // }

    public function uploadfile(Request $request)
    {
        $file = $request->file('invoice');
            //    $img = Storage::putFileAs('/public/storage/invoice',$request->invoice,'invoice.png');
         $img = $file->storeAs('public/invoice','invoice.png');
    //    $file =  file('/storage/app/invoice/output.csv');
        // $data = array_map('str_getcsv',($file));

        // $data = str_getcsv(file_get_contents(storage_path('app/invoice/output.csv')));
        // $number = $data[7];
        // $date = $data[8];
        // $adress = $data[9];
        // $dest = $data[10];
        // $amount = $data[11];
        // $product = $data[12];
        // return back()->compact('number','date','adress','dest','amount','product');
        return back()->with('status','uploaded successfully');
    }

    // public function readcsv()
    // {
    //     $csv = file_get_contents('/storage/app/invoice/output.csv');
    //     $data = array_map('str_getcsv',(file('/storage/app/invoice/output.csv')));
    //     dd($data);
    // }

    public function process()
    {


        //$process = new Process(array('dir', base_path() . 'C:/Users/IshidaPc/Desktop/darknet/darknet'));
        //$process->setWorkingDirectory(base_path() . 'C:/Users/IshidaPc/Desktop/darknet/darknet');
        //process = new Process("python3 C:\Users\Bikash\Desktop\E-smart Buy\webscrape.py 2>&1");
        //$script = public_path('C:/Users/IshidaPc/Desktop/darknet/darknet/extract_datas.py');
        //$process = new Process(array("python".$script));
        // $array = ["python C:\Users\IshidaPc\Desktop\darknet\darknet\extract_datas.py"];
        // $process = new Process($array);
        // $process->start();
        // $process->run();
        
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
    
        // $data = $process->getOutput();
    
        // dd($data);
        //$process1 = shell_exec('cd C:\Users\IshidaPc\Desktop\darknet\darknet\build\darknet\x64');
        
        $process = shell_exec('cd C:\Users\IshidaPc\Desktop\darknet\darknet\build\darknet\x64 && darknet_no_gpu.exe detector test data/obj.data cfg/yolov4-obj.cfg yolov4-obj_best.weights C:/xampp/htdocs/finance/storage/app/public/invoice/invoice.png -thresh 0.5');
        //thenia
        $process3 = shell_exec('cd C:\Users\IshidaPc\Desktop && mkdir Results');
        $process45 = shell_exec('cd C:\Users\IshidaPc\Desktop\Results && del * /S /Q');
        
        $process2 = shell_exec('python C:\Users\IshidaPc\Desktop\darknet\darknet\extract_datas.py');
        $process4 = shell_exec('cd C:\Users\IshidaPc\Desktop\darknet\darknet\build\darknet\x64\result_img && move *.jpg C:\Users\IshidaPc\Desktop\Results');
        $process5 = shell_exec('cd C:\Users\IshidaPc\Desktop\darknet && move *.csv C:\Users\IshidaPc\Desktop\Results');
        //$process6 = shell_exec('python C:\Users\IshidaPc\Desktop\darknet\compile.py');
        //$process = new Process(['C:/Users/IshidaPc/AppData/Local/Programs/Python/Python39/python', 'C:\Users\IshidaPc\Desktop\darknet\darknet\extract_datas.py']);
        //$process->run();

// executes after the command finishes
// if (!$process->isSuccessful()) {
//     $exception = new ProcessFailedException($process);
//     echo $exception->getMessage();

    $data = str_getcsv(file_get_contents(storage_path('app/invoice/output.csv')));
    $number = $data[7];
    $date = $data[8];
    $adress = $data[9];
    $dest = $data[10];
    $amount = $data[11];
    $product = $data[12];

    return view('process.data',compact('number','date','adress','dest','amount','product'));
    }

    public function store(Request $request){
        $extracted =Extracted::create([
            "number"=>$request->number,
            "date" =>$request->date,
            "address" =>$request->address,
            "dest" =>$request->dest,
            "amout"=>$request->amount,
            "product" =>$request->products,
            

        ]);
        $extracted->save();
        if($extracted){
            // Session::flash('success', 'Product is added successfully');
            return redirect('process')->with('success','Invoice created successfuly');
        }else
        {
            return redirect('process')->with('error','An error has accured ');
        }
        }




    // public function getdata()
    // {
    //        $data = str_getcsv(file_get_contents(storage_path('app/invoice/output.csv')));
    //     $number = $data[7];
    //     $date = $data[8];
    //     $adress = $data[9];
    //     $dest = $data[10];
    //     $amount = $data[11];
    //     $product = $data[12];
    //     return redirect()->back()->with(compact('number','date','adress','dest','amount','product'));
    // }
// public function process(){

//     //$text = "The text you are desperate to analyze :)";
//     //$process = new Process('python', "C:/Users/IshidaPc/Desktop/darknet/darknet/extract_datas.py");
//     //$process->run();

//     $process = new Process(["python C:/Users/IshidaPc/Desktop/darknet/darknet/test.py"]);

//     //$process = new Process(['python3', 'C:/Users/IshidaPc/Desktop/darknet/darknet/extract_datas.py']);
//     $process->run();
    
//     // executes after the command finishes
//     if (!$process->isSuccessful()) {
//         throw new ProcessFailedException($process);
//     }
    
//     return response()->json(['success'=>$process->getOutput()]);
// }


}
