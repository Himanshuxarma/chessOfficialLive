<?php

namespace App\Http\Controllers\Front;
use Auth;
use Mail;
use App\Mail\newCustomerMail;
use App\Mail\demoBookingMail;
use App\Mail\ordersMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Country;
use App\Models\User;
use App\Models\Demo;
use App\Models\Order;
use App\Models\CountryTimezone;
use App\Models\CardDetail;
use Hash;

class BookingController extends Controller
{
    public function index($id){
        $CourseId = Course::find($id);
        $country = Country::all();
        $timezone = CountryTimezone::all();
        return view('front.booking.booking_a_demo',compact('CourseId','country','timezone'));      
    }

    public function storeTimezone(Request $request){
        if($request->isMethod('post') && $request->ajax()){
            
            $timezones = CountryTimezone::where("country_id", $request->country_id)->pluck('timezone', 'id');
            $data = [
                'status'=>true,
                'data'=>$timezones
            ];
        } else {
            $data = [
                'status'=>false
            ];
        }
        return response()->json($data);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function demo_booking(Request $request){
        if(Auth::guard('customer')->check()){
            $validatedData = $request->validate([
                'country_id' => 'required',
                'timezone_id' => 'required',
                'date_of_demo' => 'required',
                'time_of_demo' => 'required'
            ]);
        } else {
            $validatedData = $request->validate([
                'full_name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'required',
                'country_id' => 'required',
                'timezone_id' => 'required',
                'date_of_demo' => 'required',
                'time_of_demo' => 'required'
            ]);
        }
        $customerId = 0;
        if(!Auth::guard('customer')->check()){
            $data = $request->all();
            $password = substr(md5(rand()),0,5);
            $check = User::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'decryptedPass' => $password, 
                'password' => Hash::make($password),
                'role'=>'customer'
            ]);
            if($check->id){
                $customerId = $check->id;
                $furtherProcess = true;
                Mail::to($data['email'])->send(new newCustomerMail($check));
            }
        } else {
            $customerId = Auth::guard('customer')->user()->id;
        }
        if(!empty($customerId) && $customerId != 0){
            $demoBoking = new Demo;
            $demoBoking->course_id = $request->course_id;
            $demoBoking->country_id = $request->country_id;
            $demoBoking->timezone_id = $request->timezone_id;
            $demoBoking->date_of_demo = $request->date_of_demo;
            $demoBoking->time_of_demo = $request->time_of_demo;
            $demoBoking->customer_id = $customerId ? $customerId : "0";
            
            if($demoBoking->save()){
                $user = User::where('id', $customerId)->first();

                Mail::to($user['email'])->send(new demoBookingMail($user, $demoBoking));
                // dd($demoBoking);
                return redirect()->route('courseDetails', $request->course_id)->with('success', 'Your demo has been booked, Admin wil look into it and revert you back soon.');
            } else {
                return redirect()->route('courseDetails', $request->course_id)->with('error', 'Something went wrong.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login first.');
        }
        
        
    
    }

      /**

   *  Buy Course

   *

   */
  
    public function buy_course($id){ 
        $CourseId = Course::find($id);    
        $country = Country::all();
        return view('front.booking.buy_course',compact('country','CourseId')); 
    }
        
  /**

   * Store Buy Course

   *

   */

    public function storeBuycourse(Request $request){
        $request->validate([
            'country_id' => 'required',
            'timezone_id' => 'required',
            'date_of_demo' => 'required',
            'time_of_demo' => 'required',
            'name' => 'required',
            'card_number' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv' => 'required',
        ]);
        $customerId = 0;
        if(!Auth::guard('customer')->check()){
            $data = $request->all();
            $password = substr(md5(rand()),0,5);
            $check = User::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'uncreyptedPass' => $password, 
                'password' => Hash::make($password),
                'role'=>'customer'
            ]);
            if($check->id){
                $customerId = $check->id;
                $furtherProcess = true;
                Mail::to($data['email'])->send(new newCustomerMail($check));
            }
        } else {
            $customerId = Auth::guard('customer')->user()->id;
        }
        if(!empty($customerId) && $customerId != 0){
            $cardDetails = new CardDetail;
            $cardDetails->name = $request->name;
            $cardDetails->card_number = $request->card_number;
            $cardDetails->exp_month = $request->exp_month;
            $cardDetails->exp_year = $request->exp_year;
            $cardDetails->cvv = $request->cvv;
            $cardDetails->status = $request->status ? $request->status : 0;
            $cardDetails->customer_id = $customerId ? $customerId : "0";
            $cardDetails->save();
            
        }
        if(!empty($customerId) && $customerId != 0){
            $orders = new Order;
            $orders->course_id = $request->course_id;
            $orders->course_type = $request->course_type;
            $orders->price = $request->price;
            $orders->country_id = $request->country_id;
            $orders->timezone_id = $request->timezone_id;
            $orders->date_of_demo = $request->date_of_demo;
            $orders->time_of_demo = $request->time_of_demo;
            $orders->customer_id = $customerId ? $customerId : "0";
            
            if($orders->save()){
                $user = User::where('id', $customerId)->first();
    
                Mail::to($user['email'])->send(new ordersMail($user, $orders));
                return redirect()->route('courseDetails', $request->course_id)->with('success', 'Your demo has been booked, Admin wil look into it and revert you back soon.');
            } else {
                return redirect()->route('courseDetails', $request->course_id)->with('error', 'Something went wrong.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

    }
}
