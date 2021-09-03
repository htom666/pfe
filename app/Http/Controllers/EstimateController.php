<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstimateRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Estimate;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Session;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i =1;
        $estimate = Estimate::all();
        $company_list = DB::table('companies')
            ->groupBy('name')
            ->get();
        return view('estimate.estimate', compact('estimate','i'))->with('company_list', $company_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        $facture = Estimate::all()->count();
        $estimate ='EST' . (str_pad((int)$facture, 4, '0', STR_PAD_LEFT));
        return view('estimate.create', compact('client','estimate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstimateRequest $request)
    { 
        $services = Service::all();
        
        if ($request->orderProduct) {
           
            $estimate = Estimate::create([
                'estimate_number' => $request->estimate_number,
                'company_name' => $request->company_name,
                'company_phone' => $request->company_phone,
                'estimate_date' => $request->estimate_date,
                'expiration_date' =>$request->expiration_date,
                'client_id' => $request->client_id,
                'company_address' => $request->company_address,
                'tva' => $request->tva,
                'tax' =>$request->tax,
                'ttc'=>$request->ttc,
                'pht'=>$request->pht
            ]);
            if($request->has('orderProduct')){
            foreach ($request->orderProduct as $product) {
               
                $estimate->products()->attach(
                    $product['product_id'],
                    ['quantity' => $product['quantity'],
                     'price' => $product['total_price'],
                     ]
                );
            }
        }        if($request->has('orderService')){    
                foreach ($request->orderService as $service) {
                $item = $services->where('id',1)->first();
                $estimate->services()->attach(
                    $service['service_id'],
                    ['quantity' => $service['quantity'],
                     'price' => $item->price ?? 0.1,
                     ]
                );
            
            }
        }

         
        }
        return back()->with('success','Estimate created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */

    public function status($id)
    {
        
        $user = auth()->user();
        $estimate = Estimate::findOrFail($id);
        $client = Client::all();
        $company= Company::all();
        return view('estimate.status', compact('estimate','client','company','user'));
    }
    public function updateStatus(Request $request,$id)
    {
        Estimate::findOrFail($id);
        $s = $request->input('status');
        if($s =='Cancel')
        {
            DB::table('estimates')
            ->where('id',$id)
            ->update(['status'=>1]);
        }
        else
        {
            DB::table('estimates')
            ->where('id',$id)
            ->update(['status'=>0]); 
        }
        if ($request) {
            return back()->with('success','estimate status updated successfuly');
        }
        
    }
    public function createPDF($id) {
        $user=auth()->user();
        set_time_limit(0);
        // $data = array();
        // retreive all records from db
        $estimate = Estimate::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        // array_push($data, $facture,$client,$company);
  
        // share data to view
        view()->share('estimate',$estimate);

        $pdf = PDF::loadView('estimate.pdf', $estimate,compact('user'));
  
        // download PDF file with download method
        // $download =$pdf->download('pdf_file.pdf');
         
         return $pdf->download('pdf_file.pdf');
      }
      public function sendmail(Request $request,$id)
    {
        $user = auth()->user();
        
        $estimate = Estimate::findOrFail($id); 
        
        set_time_limit(0);
        // $data = array();
        // retreive all records from db
        $estimate = Estimate::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        // array_push($data, $facture,$client,$company);
  
        // share data to view
        view()->share('estimate',$estimate);

        $pdf = PDF::loadView('estimate.pdf', $estimate,compact('user'));
  
        // download PDF file with download method
        file_put_contents('estimate.pdf', $pdf->output());
        // Storage::put('invoice.pdf', $pdf->output());
         $data =file_get_contents('estimate.pdf');
        
       $mail = new PHPMailer(true);

    //Server settings             
      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mailer.sloth-lab.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'no-reply@sloth-lab.com';                     //SMTP username
    $mail->Password   = 'HuaweiU8180.';                               //SMTP password
    $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('no-reply@sloth-lab.com');
    $mail->addAddress('amine.kacem1337@gmail.com');     //Add a recipient

    //Attachments  
     $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/invoice.pdf');     //Add attachments
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'SLOTH-LAB';
    $mail->Body    = "Here’s $estimate->estimate_number, from SLOTH-LAB, which is due on $estimate->estimate_date. Thanks so much for your business.";

    if($mail->send())
    {
        Session::flash('success','sent');
        return back()->with('success','estimate sent !');

    }
    else
    {
        Session::flash('error','an error has accured');
        return back();
    }
        // $data["email"] = "ficoy90392@nhmty.com";
        // $data["title"] = "From ItSolutionStuff.com";
        // $data["body"] = "This is Demo";

        // $pdf = PDF::loadView('facture.pdf', $facture);
        // $mail = Mail::send('facture.mail', $data, function ($message) use($data,$pdf) {
        //     $message->to($data["email"],$data["email"])
        //     ->subject($data["title"])
        //     ->attachData($pdf->output(), "text.pdf");
        // });
        // dd($pdf->output());

    }
    public function deletedInvoices()
    {
        $user = auth()->user();
        $i = 1;
        $estimates = DB::table('estimates')
        ->whereNotNull('deleted_at')
        ->get();
        return view('estimate.trash', compact('estimates','i','user'));

    }
    public function restoreInvoices($id)
    {
        $estimate = Estimate::withTrashed()->find($id);
                $estimate->restore();
        return redirect()->route('estimate.estimate');
    }
    public function forceDelete($id)
    {
        $estimate = Estimate::where('id',$id)->forceDelete();
        if($estimate)
        {
            return back()->with('success','estimate permanently deleted');
        }
    }

    public function show($id)
    {
        $estimate = Estimate::findOrFail($id);  
        $user = auth()->user();
        $client = Client::all();
        $company= Company::all();
        return view('estimate.show', compact('estimate','client','company','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimate = Estimate::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        return view('estimate.edit', compact('estimate','client','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(EstimateRequest $request)
    {
        
       
        $estimate = Estimate::findOrFail($request->id);
        $estimate->estimate_number =$request->estimate_number;
        $estimate->company_name =$request->company_name;
        $estimate->company_phone =$request->company_phone;
        $estimate->estimate_date =$request->estimate_date;
        $estimate->client_id =$request->client_id;
        $estimate->company_address =$request->company_address;
        $estimate->tva =$request->tva;
        $estimate->tax =$request->tax;
        $estimate->ttc =$request->ttc;
        $estimate->pht =$request->pht;
        $estimate->save();
        foreach ($estimate->products as $product) {
            $estimate->products()->detach($product->id);
        }
        foreach ($estimate->services as $service) {
            $estimate->services()->detach($service->id);
        }
        if($request->has('orderProduct')){
        foreach ($request->orderProduct as $product) {
               
            $estimate->products()->attach(
                $product['product_id'],
                ['quantity' => $product['quantity'],
                 'price' => $product['total_price'],
                 ]
            );
        }
    }
    if($request->has('orderService')){
        foreach ($request->orderService as $service) {
               
            $estimate->services()->attach(
                $service['service_id'],
                ['quantity' => $service['quantity'],
                 'price' => $service['total'],
                 ]
            );
        }
    }


        
        return back()->with('success','Estimate updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
       $delete = $estimate->delete();
       if($delete)
       {
        return back()->with('success','estimate deleted successfuly');
       }
       else 
       return back()->with('error','an error has occured');
    }
   
    
    }
