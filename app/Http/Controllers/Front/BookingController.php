<?php

namespace App\Http\Controllers\Front;
use Auth;
use Mail;
use Session;
use App\Mail\newCustomerMail;
use App\Mail\demoBookingMail;
use App\Mail\ordersMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\Country;
use App\Models\User;
use App\Models\Demo;
use App\Models\Order;
use App\Models\CountryTimezone;
use App\Models\CardDetail;
use Hash;
use Razorpay\Api\Api;
use Exception;

class BookingController extends Controller
{

    public function __construct(){
        $countryData = Country::where('id', 6)->where('status', 1)->first();
        $countryId = !empty($countryData) && $countryData->id ? $countryData->id : 6 ;
        Session::put('SiteCountry', $countryId);
        // $this->middleware('auth:admin');
    }

    public function index($id=null){
        $countryId = Session::get('SiteCountry');
        $courseData = Course::find($id);
        $country = Country::all();
        $course = Course::all();
        $timezones = CountryTimezone::where('country_id', $countryId)->get();
        return view('front.booking.booking_a_demo',compact('courseData','country','timezones','course'));
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
        }
         else {
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
    public function buy_course($id=null){ 
        // $isCouse = false;
        // if(!empty($id)){
        //     $isCouse = true;
        // }else{
        //     $isCouse = false;
        // }
        // dd("singh");
        $countryId = Session::get('SiteCountry');
        $courseData = Course::find($id);
        $country = Country::all();
        $course = Course::all();
        $timezones = CountryTimezone::where('country_id', $countryId)->get();
        return view('front.booking.buy_course',compact('courseData','country','timezones','course'));
    }
        
  /**

   * Store Buy Course

   *

   */

    public function storeBuycourse(Request $request){
        if(Auth::guard('customer')->check()){
            $validatedData = $request->validate([
                'country_id' => 'required',
                'timezone_id' => 'required',
                'course_id' => 'required',
                'date_of_demo' => 'required',
                'time_of_demo' => 'required',
                // 'name' => 'required',
                // 'card_number' => 'required',
                // 'exp_month' => 'required',
                // 'exp_year' => 'required',
                // 'cvv' => 'required',
            ]);
        }
         else {
            $validatedData = $request->validate([
                'full_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'phone' => 'required',
                'country_id' => 'required',
                'timezone_id' => 'required',
                'course_id' => 'required',
                'date_of_demo' => 'required',
                'time_of_demo' => 'required',
                // 'name' => 'required',
                // 'card_number' => 'required',
                // 'exp_month' => 'required',
                // 'exp_year' => 'required',
                // 'cvv' => 'required',
            ]);
        }
        $customerId = 0;
        if(!Auth::guard('customer')->check()){
            $data = $request->all();
            // $password = substr(md5(rand()),0,5);
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
                /* Ye last m open krne hai apne ko jab apni SMTP details add krdenge apn */
                // Mail::to($data['email'])->send(new newCustomerMail($check));
            }
        } else {
            $customerId = Auth::guard('customer')->user()->id;
        }

        if(!empty($customerId) && $customerId != 0){
            $cardDetails = new CardDetail;
            $cardDetails->name = !empty($request->name) ? $request->name : '';
            $cardDetails->card_number = !empty($request->card_number) ? $request->card_number : '';
            $cardDetails->exp_month = !empty($request->exp_month) ? $request->exp_month : '';
            $cardDetails->exp_year = !empty($request->exp_year) ? $request->exp_year : '';
            $cardDetails->cvv = !empty($request->cvv) ? $request->cvv : '';
            $cardDetails->status = $request->status ? $request->status : 0;
            $cardDetails->customer_id = $customerId ? $customerId : 0;
            $cardDetails->save();
        }
        if(!empty($customerId) && $customerId != 0){
            $orders = new Order;
            $orders->course_id = $request->course_id;
            $courseDatail = Course::where('id', $request->course_id)->first();
            $coursePriceDatail = CoursePrice::where('course_id', $request->course_id)->where('country_id', $request->country_id)->first();

            $price = !empty($request->course_price) ? $request->course_price : (!empty($coursePriceDatail) && !empty($coursePriceDatail->price) ? $coursePriceDatail->price : (!empty($courseDatail) && !empty($courseDatail->price) ? $courseDatail->price : ''));
            
            $orders->course_type = !empty($request->course_type) ? $request->course_type : (!empty($courseDatail) && !empty($courseDatail->type) ? $courseDatail->type : '');
            /* currency b mil rahi hai, check krlena thik hai */
            $orders->price = $price;

            $orders->country_id = $request->country_id;
            $orders->timezone_id = $request->timezone_id;
            $orders->date_of_demo = $request->date_of_demo;
            $orders->time_of_demo = $request->time_of_demo;
            $orders->customer_id = $customerId ? $customerId : "0";
            
            if($orders->save()){
                $user = User::where('id', $customerId)->first();
                /* Ye last m open krne hai apne ko jab apni SMTP details add krdenge apn */
                // Mail::to($user['email'])->send(new ordersMail($user, $orders));
                return redirect()->route('courseDetails', $request->course_id)->with('success', 'Your demo has been booked, Admin wil look into it and revert you back soon.');
            } else {
                return redirect()->route('courseDetails', $request->course_id)->with('error', 'Something went wrong.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

    }


     /**
     * Write code on Method
     * @return response()
     */
    public function bookingDemo() {
        return view('front.razorpay.index');
    }

    /**
     * Write code on Method
     * @return response()
     */
    public function bookingDemoStore(Request $request) {
        $RAZORPAY_KEY = env('RAZORPAY_KEY');
        $RAZORPAY_SECRET = env('RAZORPAY_SECRET');

        $input = $request->all();

        $api = new Api($RAZORPAY_KEY, $RAZORPAY_SECRET);

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input) && !empty($input['razorpay_payment_id'])) {

            try {
                dump($payment);
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                dd($response);
            } catch (Exception $e) {

                return $e->getMessage();

                Session::put('error', $e->getMessage());

                return redirect()->back();
            }
        }



        Session::put('success', 'Payment successful');

        return redirect()->back();
    }
}
