<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function chat()
    {
        return view('user.messages');
    }
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('user.user',compact('users'));
        
    }
    public function show($id){
        $user = User::findOrFail($id);
        return view('user.show',compact('user'));
    }


    public function create(){
            return view('user.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return back();
    }
}
