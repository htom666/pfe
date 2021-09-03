<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('contact.contactForm');
    }
    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);
            $contact =contact::create([
            'name' => $request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'subject' =>$request->subject,
            'message' =>$request->message,

        ]);
        if($contact){
            return back()->with('success','Message sent successfuly');
        }
        
    }
    public function contact()
    {
        $contact = contact::all();
        return view('contact.contacts',compact('contact'));
    }
    public function destroy($id)
    {
        $delete = contact::find($id)->delete();
        if($delete)
        {
            return back()->with('success','message deleted successfuly');
        }
    }
}
