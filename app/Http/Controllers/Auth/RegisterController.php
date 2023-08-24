<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\newCustomerMail;
use Mail;
use App\Rules\ReCaptcha;

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
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users|numeric',
            'register_password' => 'required|min:6',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $data = $request->all();
        $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $referralCode = substr(str_shuffle($str), 0, 10);
        $registrationData = [
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['register_password']),
            'role'=>'customer',
            'referral_code'=>$referralCode
        ];
        // dd($registrationData);
        
        $check = User::create($registrationData);
        if($check->id){
            if($request->referral_code && $request->referee_email){
                $referrerDetails = User::where('referral_code', $request->referral_code)->first();
                $referralData = Referral::where('sent_to_email', $request->referee_email)->first();
                $referralData->new_user_id = $check->id  ? $check->id : 0;
                $referralData->save();
            }
            $customerId = $check->id;
            $furtherProcess = true;
            $check->decryptedPass = $data['register_password'];
            Mail::to($data['email'])->send(new newCustomerMail($check));
            return redirect(route("frontLogin"))->with('successMessage', 'Great! You have registered successfully.');
        } else {
            return redirect(route("frontLogin"))->with('loginError', 'Something went wrong.');
        }
    }
}
