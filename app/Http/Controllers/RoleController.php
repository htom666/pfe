<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $roles = Role::get();
       return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {

             $role = $this->process(new Role,$request);
            if($role){
                    return redirect()->route('roles.index')->with('success','role added successfuly');
            }
        
            else
            return redirect()->route('roles.index')->with('error','an error has accured');
       
        // $role = Role::create([
        //     'name' => $request->name,
        // ]);
        // foreach($request->permissions as $permission){
        //     $role->permissions()->attach($permission);
        // }
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update($id,RolesRequest $request)
     {
         try
         {
             $role = Role::find($id);
             $role = $this->process($role,$request);
             if($role)
             return redirect()->route('roles.index')->with('success', 'role updated successfuly');
             else
             return redirect()->route('roles.index')->with('error','an error has accured');
         }catch (\Exception $exception) {
             return $exception;
             return redirect()->route('roles.index')->with('error','an error has accured');
         }

    //     $role = Role::find($request->id);
    //     $role->update([
    //         'name'=> $request->name
    //     ]);
    //     foreach($role->permissions as $permission)
    //     {
    //         $role->permissions()->attach($permission);
    //     }
    //     foreach ($request->permissions as $permission)

    //     {
    //         $role->permissions()->attach($permission);
    //     }
    //     return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $role = Role::find($id);
        $delete = $role->delete();
        if($delete == 1) {
            return back()->with('success','role deleted succussfuly');
        }else
        {
          return back()->with('error','an error has occured');
        }
    }


    protected function process(Role $role , Request $request)
    {
        $role->name = $request->name;
        $role->permissions = json_encode($request->permissions);
        $role->save();
        return $role;
    }
}
