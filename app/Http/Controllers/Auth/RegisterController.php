<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\newCustomerMail;
use Mail;

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
    
    public function register(){
        return view('admin.auth.register');

      } 

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function postRegistration(Request $request){
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6'
        ]);
            $data = $request->all();
            $check = User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'role'=>'customer'
        ]);
        if($check->id){
            $customerId = $check->id;
            $furtherProcess = true;
            $check->decryptedPass = $data['password'];
            Mail::to($data['email'])->send(new newCustomerMail($check));
        }
        // $check = $this->create($data);
         return redirect(route("home"))->withSuccess('Great! You have Successfully loggedin');
    }
}
