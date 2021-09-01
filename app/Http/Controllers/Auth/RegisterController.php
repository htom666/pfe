<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'capital' => ['required', 'numeric'],
            'address' => ['required', 'string','max:255'],
            'tax_ref_number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'last_name'=>$data['last_name'],
            'company'=>$data['company'],
            'capital'=>$data['capital'],
            'address'=>$data['address'],
            'tax_ref_number'=>$data['tax_ref_number'],
            'password' => Hash::make($data['password']),
        ]);
        if (request()->hasFile('logo')) {
            $logo = request()->file('logo')->getClientOriginalName();
            request()->file('logo')->storeAs(('/public/logo'),$user->id . '/' . $logo,'');
            $user->update(['logo'=>$logo]);
        }
        if (request()->hasFile('personal_image')) {
            $personal_image = request()->file('personal_image')->getClientOriginalName();
            request()->file('personal_image')->storeAs(('/public/personal_image'),$user->id . '/' . $personal_image,'');
            $user->update(['personal_image'=>$personal_image]);
        }
        return $user;
    }
}
