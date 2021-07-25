<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Facture;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FactureRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class FactureController extends Controller
{
    public function index()
    {
        $i=1;
        $facture = Facture::all();
        $company_list = DB::table('companies')
            ->groupBy('name')
            ->get();
        return view('facture.facture', compact('facture','i'))->with('company_list', $company_list);
    }
    public function edit($id)
    {
        $facture = Facture::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        return view('facture.edit', compact('facture','client','company'));
    }
    public function update(Request $request)
    {   

       
        $facture = Facture::findOrFail($request->id);
        $facture->invoice_number =$request->invoice_number;
        $facture->company_name =$request->company_name;
        $facture->company_phone =$request->company_phone;
        $facture->invoice_date =$request->invoice_date;
        $facture->client_id =$request->client_id;
        $facture->company_address =$request->company_address;
        $facture->tva =$request->tva;
        $facture->tax =$request->tax;
        $facture->ttc =$request->ttc;
        $facture->save();
        foreach ($facture->products as $product) {
            $facture->products()->detach($product->id);
        }
        foreach ($facture->services as $service) {
            $facture->services()->detach($service->id);
        }
        foreach ($request->orderProduct as $product) {
               
            $facture->products()->attach(
                $product['product_id'],
                ['quantity' => $product['quantity'],
                 'price' => $product['total_price'],
                 ]
            );
        }
        foreach ($request->orderService as $service) {
               
            $facture->services()->attach(
                $service['service_id'],
                ['quantity' => $service['quantity'],
                 'price' => $service['total'],
                 ]
            );
        }


        
        return back();
    }
    public function create()
    {
        $client = Client::all();
        return view('facture.create', compact('client'));
    }
    public function store(Request $request)
    {
        $services = Service::all();
        // $factur = Facture::all();
            $facture = Facture::create([
                'invoice_number' => $request->invoice_number,
                'company_name' => $request->company_name,
                'company_phone' => $request->company_phone,
                'invoice_date' => $request->invoice_date,
                'expiration_date' => $request->expiration_date,
                'client_id' => $request->client_id,
                'company_address' => $request->company_address,
                'tva' => $request->tva,
                'tax' =>$request->tax,
                'ttc'=>$request->ttc,
                'pht'=>$request->pht,
                'rest_to_pay'=>$request->ttc,
            ]);
            if($request->has('orderProduct')){
            foreach ($request->orderProduct as $product) {
               
                $facture->products()->attach(
                    $product['product_id'],
                    ['quantity' => $product['quantity'],
                     'price' => $product['total_price'],
                     ]
                );
            }
        }
        if($request->has('orderService')){
            foreach ($request->orderService as $service) {
                $item = $services->where('id',1)->first();
                $facture->services()->attach(
                    $service['service_id'],
                    ['quantity' => $service['quantity'],
                     'price' => $item->price ?? 0.1,

                     ]
                );
            

        }
    }
        return back();
    }
    public function destroy(Facture $facture)
    {
        $facture->delete();
        return back();
    }
    public function show($id)
    {
        $user=auth()->user();
        $facture = Facture::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();

        return view('facture.show', compact('facture','client','company','user'));
    }
    public function createPDF($id) {
        set_time_limit(0);
        // $data = array();
        // retreive all records from db
        $facture = Facture::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        // array_push($data, $facture,$client,$company);
  
        // share data to view
        view()->share('facture',$facture);

        $pdf = PDF::loadView('facture.pdf', $facture);
  
        // download PDF file with download method
         
         return $pdf->download('pdf_file.pdf');
      }
    public function sendmail(Request $request,$id)
    {
        
        $facture = Facture::findOrFail($id); 
        
        set_time_limit(0);
        // $data = array();
        // retreive all records from db
        $facture = Facture::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        // array_push($data, $facture,$client,$company);
  
        // share data to view
        view()->share('facture',$facture);

        $pdf = PDF::loadView('facture.pdf', $facture);
  
        // download PDF file with download method
        file_put_contents('invoice.pdf', $pdf->output());
        // Storage::put('invoice.pdf', $pdf->output());
         $data =file_get_contents('invoice.pdf');
        
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
    $mail->addAddress('hatemdahech1@gmail.com');     //Add a recipient

    //Attachments  
     $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/invoice.pdf');     //Add attachments
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    if($mail->send())
    {
        Session::flash('success','sent');
        return back();

    }
    else
    {
        Session::flash('success','Message has been sent');
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
        $facture = DB::table('factures')
        ->whereNotNull('deleted_at')
        ->get();
        return view('facture.trash', compact('facture'));

    }
    public function restoreInvoices($id)
    {
        $facture = Facture::withTrashed()->find($id);
                $facture->restore();
        return redirect()->route('facture.facture');
    }
    public function payedInvoices()
        {
            $i=1;
            $facture =DB::table('factures')->where('rest_to_pay','0')->get();
            return view('facture.payed',compact('facture','i'));
        }
    public function unpayedInvoices()
    {
        $i=1;
        $facture = DB::table('factures')->where('rest_to_pay','>', '0')->get();
        return view('facture.unpayed',compact('facture','i'));
    }
    // public function showstat($id)
    // {
    //     $facture = Facture::where('id',$id)->first();
    //     return view('facture.status',compact('facture'));
    // }
    
}