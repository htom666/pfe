<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function chat()
    {
        return view('user.messages');
    }
    public function index()
    {
        $i = 1;
        $users = User::orderBy('id','desc')->get();
        return view('user.list',compact('users','i'));
        
    }
    public function show($id){
        $user = User::findOrFail($id);
        return view('user.show',compact('user'));
    }


    public function create(){
        $roles = Role::get();
            return view('user.create',compact('roles'));
    }
    public function store(Request $request)
    {
        $user= User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'last_name'=>$request->last_name,
            "password"=> Hash::make($request['password']),
            "role_id"=>$request->role_id,
        ]);
        if (request()->hasFile('personal_image')) {
            $personal_image = request()->file('personal_image')->getClientOriginalName();
            request()->file('personal_image')->storeAs(('/public/personal_image'),$user->id . '/' . $personal_image,'');
            $user->update(['personal_image'=>$personal_image]);
        }
        if($user){
                 return back()->with('success','User created successfuly');
             }
            else{
                return back()->with('error','an error has occured');
    }
}

    // public function store(UsersRequest $request)
    // {
    //     // $user = new User();
    //     $user = User::create([
    //         "name"=>$request->name,
    //         "email"=>$request->email,
    //         "last_name"=>$request->last_name,
    //         "password"=>Hash::make($request->password),
    //         "role_id"=>$request->role_id,
    //     ]);
    //     // $user->name = $request->name;
    //     // $user->email = $request->email;
    //     // $user->last_name = $request->lastname;
    //     // $user->password = bcrypt($request->password);
    //     // $user->role_id = $request->role_id;
    //      if (request()->hasFile('personal_image')) {
    //         $personal_image = request()->file('personal_image')->getClientOriginalName();
    //         request()->file('personal_image')->storeAs(('/public/personal_image'),$user->id . '/' . $personal_image,'');
    //         $user->update(['personal_image'=>$personal_image]);
    //     }
    //     return $user;

     
    // if($user){
    //     return back()->with('success','User created successfuly');
    // }
    // else{
    //     return back()->with('error','an error has occured');
    // }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit',compact('user'));
    }
    public function destroy(User $user)
    {
        
        $user->delete();
        return back()->with('success','user deleted successfuly');
    }
    public function editall(User $user)
    {
        $roles = Role::all();
        return view('user.editall',compact('user','roles'));
    }

    public function updateall(Request $request,User $user)
    {
        $id = $user->id;
        DB::table('users')
        ->where('id',$id)
        ->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request['pasword']),
            "role_id"=>$request->role_id,
        ]);
        return back()->with('success','user updated successfuly');
        
    }
    public function updateprofile(Request $request,User $user)
    { 
        $user = Auth::user();
        $id = $user->id;
       
        $id = $user->id;
        if (request()->hasFile('logo')) {
            $logo = request()->file('logo')->getClientOriginalName();
            request()->file('logo')->storeAs(('/public/logo'),$user->id . '/' . $logo,'');
          $lg =User::where('id',$id)
            ->update([
                'logo'=>$logo
            ]);
            $lg->save();
        }
        if (request()->hasFile('personal_image')) {
            $personal_image = request()->file('personal_image')->getClientOriginalName();
            request()->file('personal_image')->storeAs(('/public/personal_image'),$user->id . '/' . $personal_image,'');
           $pr = User::where('id',$id)
            ->update(['personal_image'=>$personal_image]);
            $pr->save();
        }
        DB::table('users')
        ->where('id',$id)
        ->update([
            "name"=>$request->name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            "company" => $request->company,
            "capital" => $request->capital,
            "address" => $request->address,
            "tax_ref_number" => $request->tax_ref_number,
            "password"=> Hash::make($request['password']),
        ]);
        return back()->with('success','user updated successfuly');
        
    }
}
