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
use App\Models\Referral;
use Hash;
use Razorpay\Api\Api;
use Exception;
use DB;
use Validator;
use App\Models\Transaction;

class BookingController extends Controller {

    public function __construct() {
        $countryData = Country::where('id', 6)->where('status', 1)->first();
        $countryId = !empty($countryData) && $countryData->id ? $countryData->id : 6;
        Session::put('SiteCountry', $countryId);
        // $this->middleware('auth:admin');
    }

    public function index($id = null) {
        $courseData = Course::find($id);
        $country = Country::all();
        $course = Course::all();
        $countryId = Session::get('SiteCountry');
        $timezones = CountryTimezone::where('country_id', $countryId)->get();
        return view('front.booking.booking_a_demo', compact('courseData', 'country', 'timezones', 'course'));
    }

    public function storeTimezone(Request $request) {
        if ($request->isMethod('post') && $request->ajax()) {
            $timezones = CountryTimezone::where("country_id", $request->country_id)->pluck('timezone', 'id');
            $data = [
                'status' => true,
                'data' => $timezones
            ];
        } else {
            $data = [
                'status' => false
            ];
        }
        return response()->json($data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function demo_booking(Request $request) {
        if (Auth::guard('customer')->check()) {
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
                'password' => 'required',
                'phone' => 'required',
                'country_id' => 'required',
                'timezone_id' => 'required',
                'date_of_demo' => 'required',
                'time_of_demo' => 'required'
            ]);
        }
        $customerId = 0;
        if (!Auth::guard('customer')->check()) {
            $data = $request->all();
            $password = substr(md5(rand()), 0, 5);
            $check = User::create([
                        'full_name' => $data['full_name'],
                        'email' => $data['email'],
                        'phone' => $data['phone'],
                        'password' => Hash::make($data['password']),
                        'role' => 'customer'
            ]);
            if ($check->id) {
                $customerId = $check->id;
                $furtherProcess = true;
                Mail::to($data['email'])->send(new newCustomerMail($check));
            }
        } else {
            $customerId = Auth::guard('customer')->user()->id;
        }
        if (!empty($customerId) && $customerId != 0) {
            $demoBoking = new Demo;
            $demoBoking->course_id = $request->course_id;
            $demoBoking->country_id = $request->country_id;
            $demoBoking->timezone_id = $request->timezone_id;
            $demoBoking->date_of_demo = $request->date_of_demo;
            $demoBoking->time_of_demo = $request->time_of_demo;
            $demoBoking->customer_id = $customerId ? $customerId : "0";
            if ($demoBoking->save()) {
                $user = User::where('id', $customerId)->first();

                Mail::to($user['email'])->send(new demoBookingMail($user, $demoBoking));
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
    public function buy_course($id = null) {
        $customer = Auth::guard('customer')->user();
        $countryId = Session::get('SiteCountry');
        $courseData = Course::find($id);
        $country = Country::all();
        $course = Course::all();
        $referee_customer = '';
        $referral_customer = '';
        if($customer && $customer->id){
            $referee_customer = Referral::where('new_user_id', $customer->id)->where('is_referee_used', '!=', 1)->first();
            $referral_customer = Referral::where('sent_by', $customer->id)->where('is_referee_used', 1)->where('is_referrer_used', '!=', 1)->first();    
        }
        
        $timezones = CountryTimezone::where('country_id', $countryId)->get();
        return view('front.booking.buy_course', compact('courseData', 'country', 'timezones', 'course', 'referee_customer', 'referral_customer'));
        
    }

    /**

     * Store Buy Course

     *

     */
    public function storeBuycourse(Request $request) {
        $data = $request->all();
        if (Auth::guard('customer')->check()) {
            $valiKey = [
                'country_id' => 'required',
                'timezone_id' => 'required',
                'course_id' => 'required',
                'date_of_demo' => 'required',
                'time_of_demo' => 'required',
            ];
        } else {
            $valiKey = [
                'full_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'phone' => 'required',
                'country_id' => 'required',
                'timezone_id' => 'required',
                'course_id' => 'required',
                'date_of_demo' => 'required',
                'time_of_demo' => 'required',
            ];
        }
        $validator = Validator::make($data, $valiKey);
        if ($validator->fails()) {
            return json_encode(['status' => 401, 'errors' => $validator->messages()]);
        }
        try {
            DB::beginTransaction();
            $customerId = 0;
            if (!Auth::guard('customer')->check()) {
                $data = $request->all();
                // $password = substr(md5(rand()),0,5);
                $check = User::create([
                            'full_name' => $data['full_name'],
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                            'password' => Hash::make($data['password']),
                            'role' => 'customer'
                ]);
                if ($check->id) {
                    $customerId = $check->id;
                    $furtherProcess = true;
                    try {
                        Mail::to($data['email'])->send(new newCustomerMail($check));
                    } catch (Exception $ex) {
                        
                    }
                }
            } else {
                $customerId = Auth::guard('customer')->user()->id;
            }

            if (!empty($customerId) && $customerId != 0) {
                $orders = new Order;
                $orders->course_id = $request->course_id;
                $courseDatail = Course::where('id', $request->course_id)->first();
                // $priceData = $courseDatail ? $courseDatail->coursePrice($courseDatail->id) : [];
                $coursePriceDatail = CoursePrice::where('course_id', $request->course_id)->where('country_id', $request->country_id)->first();

                $price = !empty($coursePriceDatail) && !empty($coursePriceDatail->first_price) ? $coursePriceDatail->first_price : (!empty($request->course_price) ? $request->course_price : (!empty($courseDatail) && !empty($courseDatail->price) ? $courseDatail->price : ''));

                $orders->course_type = !empty($courseDatail) && !empty($courseDatail->type) ? $courseDatail->type : (!empty($request->course_type) ? $request->course_type : '');
                /* currency b mil rahi hai, check krlena thik hai */
                $orders->price = $price;

                $orders->country_id = $request->country_id;
                $orders->timezone_id = $request->timezone_id;
                $orders->date_of_demo = $request->date_of_demo;
                $orders->time_of_demo = $request->time_of_demo;
                $orders->customer_id = $customerId ? $customerId : "0";
                $orders->payment_status = "pending";

                if ($orders->save()) {
                    $user = User::where('id', $customerId)->first();
                    try {
                        Mail::to($user['email'])->send(new ordersMail($user, $orders));
                    } catch (Exception $ex) {
                        
                    }
                    //return redirect()->route('courseDetails', $request->course_id)->with('success', 'Your demo has been booked, Admin wil look into it and revert you back soon.');
                    $url = route("courseDetails", [$request->course_id]);

                    $price = $price;
                    $course_id = $request->course_id;
                    $order_id = $orders->id;
                    $currency = "INR";
                    DB::commit();

                    return json_encode(
                            [
                                'status' => 200,
                                'msg' => 'Your demo has been booked, Admin wil look into it and revert you back soon.',
                                'data' => '',
                                'url' => $url,
                                'price' => $price,
                                'course_id' => $course_id,
                                'order_id' => $order_id,
                                'user_id' => @$customerId,
                                'currency' => $currency,
                            ]
                    );
                } else {
                    DB::rollback();
                    $url = route("courseDetails", [$request->course_id]);
                    //return redirect()->route('courseDetails', $request->course_id)->with('error', 'Something went wrong.');
                    return json_encode(
                            [
                                'status' => 500,
                                'msg' => 'Something went wrong!',
                                'data' => '',
                                'url' => $url,
                                'price' => "",
                                'course_id' => "",
                                'order_id' => "",
                                'user_id' => "",
                                'currency' => "",
                            ]
                    );
                }
            } else {
                DB::rollback();
                //return redirect()->route('login')->with('error', 'Please login first.');
                return json_encode(
                        [
                            'status' => 500,
                            'msg' => 'Please login first!',
                            'data' => '',
                            'url' => '',
                            'price' => "",
                            'course_id' => "",
                            'order_id' => "",
                            'user_id' => "",
                            'currency' => "",
                        ]
                );
            }
        } catch (Exception $ex) {
            DB::rollback();
            return json_encode(
                    [
                        'status' => 500,
                        'msg' => 'Either something went wrong or invalid access!',
                        'data' => '',
                        'url' => '',
                        'price' => "",
                        'course_id' => "",
                        'order_id' => "",
                        'user_id' => "",
                        'currency' => "",
                    ]
            );
        }
    }

    public function bookingPaymentOnline(Request $request) {
        $data = $request->all();
        $RAZORPAY_KEY = env("RAZORPAY_KEY");
        $RAZORPAY_SECRET = env("RAZORPAY_SECRET");
        $api = new Api($RAZORPAY_KEY, $RAZORPAY_SECRET);
        $payment = $api->payment->fetch($data['razorpay_payment_id']);
        if (count($data) && !empty($data['razorpay_payment_id'])) {
            try {
                DB::beginTransaction();
                $response = $api->payment->fetch($data['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                if (@$response->id && @$response->status == "captured") {
                    $transections = [
                        "user_id" => @$data['user_id'],
                        "course_id" => @$data['courseId'],
                        "order_id" => @$data['orderId'],
                        "transaction_id" => @$data['razorpay_payment_id'],
                        "currency" => 'INR', //@$data['currency'],
                        "amount" => '1.00', //$data['price'],
                        "payment_status" => @$response->status,
                        "payment_response" => (@$response) ? json_encode(@$response) : null,
                        "status" => "1",
                    ];
                    Transaction::create($transections);

                    $order = Order::where("id", @$data['orderId'])->first();
                    if (isset($order) && !empty($order)) {
                        $order->payment_status = @$response->status;
                        $order->save();
                    }
                    DB::commit();
                    $url = route("courseDetails", [@$data['courseId']]);
                    return json_encode([
                        'status' => 200,
                        'msg' => 'Your payment has been done, Admin will look into your course purchase and revert you back soon with the details that you purchased',
                        'url' => $url
                    ]);
                } else {
                    DB::rollback();
                    return json_encode([
                        'status' => 500,
                        'msg' => 'Error! Either something went wrong or invalid access!',
                        'data' => ''
                    ]);
                }
            } catch (Exception $e) {
                DB::rollback();
                return json_encode([
                    'status' => 500,
                    'msg' => 'Error!' . $e->getMessage(),
                    'data' => ''
                ]);
            }
        } else {
            DB::rollback();
            return json_encode([
                'status' => 500,
                'msg' => 'Error! Either something went wrong or invalid access!',
                'data' => ''
            ]);
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
