<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    // protected $redirectTo = '/admin';
    // protected $loginPath = '/admin/login';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Route::current()->getPrefix()=='admin'){
            return view('auth.admin.login',[
                'title' => 'Admin Login  - ' . config('app.name'),
                'loginRoute' => 'adminLogin',
            ]);
        } else {
            return view('auth.front.login',[
                'title' => 'Customer Login  - ' . config('app.name'),
                'loginRoute' => 'login',
            ]);
        }
    }

    /**
     * Login the admin.
     * 
     * @param \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request){
        dd("singh");
        if(Route::current()->getPrefix()=='admin'){
            // dd($request);
            if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
                //Authentication passed...
                //Check if authenticated user is admin only
                $user = Auth::guard('admin')->user();
                // dd($user);
                if($user->role != 'admin'){
                    Auth::guard('admin')->logout();
                    $request->session()->invalidate();
                    return redirect()->route('adminLogin')->with('error', 'You are not authorized to Login in admin.');
                } else {
                    return redirect()->intended(route('adminDashboard'))->with('success','You are Logged in as Admin!');
                }
            }
        } else {
            if(Auth::guard('customer')->attempt($request->only('email','password'),$request->filled('remember'))){
                //Authentication passed...
                //Check if authenticated user is admin only
                $user = Auth::guard('customer')->user();
                if($user->role != 'customer'){
                    Auth::guard('customer')->logout();
                    $request->session()->invalidate();
                    return redirect()
                            ->route('home')
                            ->withErrors('You are unauthorized to Login!');
                } else {
                    // dd(Auth::guard('customer')->user());
                    return redirect()->route('front.dashboard')->with('success', 'You have Successfully loggedin');   
                }
            } else {
                return redirect(url('/'))->with('loginError', 'Invalid credentials');   
            } 
        }
        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        if(Route::current()->getPrefix()=='admin'){
            Auth::guard('admin')->logout();
            return redirect()
                ->route('adminLogin')
                ->with('status','Admin has been logged out!');
        } else {
            Auth::guard('customer')->logout();
            return redirect()
                ->route('home')
                ->with('status','Customer has been logged out!');
        }
    }

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request){
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed(){
        return redirect()
            ->route('adminLogin')
            ->withInput()
            ->withErrors('Invalid Credentials, Login failed, please try again!');
    }
}