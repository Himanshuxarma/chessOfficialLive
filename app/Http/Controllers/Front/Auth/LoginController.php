<?php
namespace App\Http\Controllers\Front\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

  

class LoginController extends Controller

{
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest',['except' => ['logout','webLogout']]);
    }


    public function postlogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        //  $credentials = $request->only('email', 'password');
         if(Auth::guard('web')->attempt($request->only('email','password'),$request->filled('remember'))){
            // dd("singh");
        
            $user = Auth::guard('web')->user();
            // dd($user);
            return redirect(route('front.dashboard'))->with('You have Successfully loggedin');
        }else{
            echo "Oppes! You have entered invalid credentials";

        }
        
        // return redirect(url('/'))->with('Oppes! You have entered invalid credentials');

    }

    public function logout() {
        Session::flush();
         Auth::logout();
         return Redirect(url('/'));

    }
    

}