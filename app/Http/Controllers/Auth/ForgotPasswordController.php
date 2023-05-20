<?php  

namespace App\Http\Controllers\Auth; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use App\Mail\forgotPasswordMail;
use Mail; 
use Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;  

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function showForgetPasswordForm(){
      return view('admin.auth.forgetPassword');
    } 

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function postForgetPasswordForm(Request $request){
      if(Route::current()->getPrefix()=='admin'){
        if($request->email){
            $userData = User::where('email', $request->email)->where('role', 'admin')->first();
            if($userData){
              $data['userData'] = $userData;
              $data['userData']['resetLink'] = "/admin/resetPassword";
              $data['email'] = $request->email;
            } else {
              return redirect(url('/'))->with('forgotPsasswordError', 'This email is not registered with us.');   
            }
        }
      } else {
        if($request->email){
            $userData = User::where('email', $request->email)->where('role', 'customer')->first();
            if($userData){
              $data['userData'] = $userData;
              $data['userData']['resetLink'] = "/resetPassword";
              $data['email'] = $request->email;
            } else {
              return redirect(url('/'))->with('forgotPsasswordError', 'This email is not registered with us.');   
            }
        } else {
            return redirect(url('/'))->with('loginError', 'Invalid credentials');   
        } 
      }
      Mail::to($data['email'])->send(new forgotPasswordMail($data['userData']));
      // die('dekho email');
      return back()->with('message', 'We have e-mailed your password reset link!');

      // $request->validate([
      //   'email' => 'required|email|exists:users',
      // ]);
      // $token = Str::random(64);
      // DB::table('password_resets')->insert([
      //   'email' => $request->email, 
      //   'token' => $token, 
      //   'created_at' => Carbon::now()
      // ]);
      // Mail::to($data['email'])->send(new newCustomerMail($check));
      // Mail::send('admin.email.forgetPassword', ['token' => $token], function($message) use($request));{
      //   $message->to($request->email);

      //   $message->subject('Reset Password');

      //   return back()->with('message', 'We have e-mailed your password reset link!');
      // }
    }

    
    
    public function adminResetPassword(){
      return view('admin.auth.forgetPasswordLink');
    }

    public function resetPassword(){
      return view('front.forgetPasswordLink');
    } 

      /**
       * Write code on Method
       *
       * @return response()
       */

      public function showResetPasswordForm($token) { 
        return view('admin.auth.forgetPasswordLink', ['token' => $token]);
      } 

      /**
       * Write code on Method
       *
       * @return response()
       */

      public function postAdminResetPassword(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6'
        ]);
        $userData = User::where('email', $request->email)->where('role', 'admin')->first();
        if(!$userData){
          return back()->withInput()->with('error', 'Invalid email !');
        } else {
          if($request->password == $request->confirm_password){
            $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
            return redirect()->route('adminLogin')->with('message', 'Your password has been changed!');
          } else {
            return back()->withInput()->with('error', "Confirm password isn't matching !");
          }
        }
      }

      public function postResetPassword(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6'
        ]);
        $userData = User::where('email', $request->email)->where('role', 'customer')->first();
        if(!$userData){
          return back()->withInput()->with('error', 'Invalid email !');
        } else {
          if($request->password == $request->confirm_password){
            $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
            return redirect()->route('home')->with('success', 'Your password has been changed!');
          } else {
            return back()->withInput()->with('error', "Confirm password isn't matching !");
          }
        }
      }

}