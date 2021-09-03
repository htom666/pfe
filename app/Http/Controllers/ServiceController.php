<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $services=Service::all();
        return view('service.service',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("service.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service =Service::create( $request->all());
        if($service){
            // Session::flash('success', 'Product is added successfully');
            return back()->with('success','service created successfuly');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->all());
        if($service){
            // Session::flash('success', 'Product is added successfully');
            return back()->with('success','service created successfuly');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $service =Service::find($id)->delete();
       if($service == 1){
        return back()->with('success','service deleted successfully');

    }
    }
    public function deletedservice()
    {
        $user = auth()->user();
        $i = 1;
        $services = DB::table('services')
        ->whereNotNull('deleted_at')
        ->get();
        return view('service.trash', compact('services','i','user'));

    }
    public function restoreservice($id)
    {
        $service = Service::withTrashed()->find($id);
                $service->restore();
                if($service)
                {
                    return back()->with('success','service restored successfuly');
                }
        return redirect()->route('service.service');
    }

    public function forceDelete($id)
    {
        $service = Service::where('id',$id)->forceDelete();
        if($service)
        {
            return back()->with('success','service permanently deleted');
        }
    }
}
