<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index' , compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create($request->all());
        return back();
    }
    public function edit($id)
    {
        $permission=Permission::find($id);
        return view('permission.edit',compact('permission'));
    }
    public function update(Request $request)
    {
        Permission::find($request->id)->update($request->all());
        return back();
    }
    public function delete($id)
    {
        $delete = Permission::find($id)->delete();

        if($delete == 1)
        {
            $success = true;
            $message = 'permission is deleted successfully :';

        }else
        {
            $success = true;
            $message = "cannot be deleted";
        }
        return response()->jspn([
            'success' =>$success,
            'message' =>$message,
        ]);
    }
}
