<?php

namespace App\Http\Controllers\Front;
use Auth;
use Mail;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\Demo;
use App\Models\Order;
use App\Models\Referral;
use App\Models\CountryTimezone;
use App\Mail\referralMail;

class DashboardController extends Controller
{
	public function __construct() {
        $countryData = Country::where('id', 6)->where('status', 1)->first();
        $countryId = !empty($countryData) && $countryData->id ? $countryData->id : 6;
        Session::put('SiteCountry', $countryId);
        // $this->middleware('auth:admin');
    }
  
  	public function index(){
		// dd(Auth::guard('customer')->user());
		if(Auth::guard('customer')->check()){
			$customer = Auth::guard('customer')->user();
			$country = Country::all();
			$countryId = Session::get('SiteCountry');
        	$timezones = CountryTimezone::where('country_id', $countryId)->get();
			$demos = Demo::all();
			$orders = Order::all();
			$referrals = Referral::where('sent_by', $customer->id)->get();
      		return view('front.dashboard.index', compact('customer', 'country', 'timezones', 'demos', 'orders', 'referrals'));
		} else {
			return redirect(route('home'))->withSuccess('Opps! You do not have access');
		}
  	}

  	public function profile (){
		if(Auth::guard('customer')->check()){
			$customer = Auth::guard('customer')->user();
    	return view('front.dashboard.profile',compact('customer'));
		}
  	}

  	public function update(Request $request){
		//dd($request);
		$validator = Validator::make($request->all(), [
			'full_name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'dob' => 'required',
			'country' => 'required',
			'state' => 'required',
			'city' => 'required',
			'address' => 'required'
		]);
		$errors = $validator->errors();
		// dd($errors);
		$customerId = $request->customer_id ? $request->customer_id : Auth::user()->id;
		$CustomerData = User::find($customerId);
		// dd($CustomerData);
		$CustomerData->full_name = $request->full_name;
		$CustomerData->country = $request->country;
		$CustomerData->state = $request->state;
		$CustomerData->city = $request->city;
		$CustomerData->address = $request->address;
		$CustomerData->dob = $request->dob;
		$CustomerData->phone = $request->phone;
		$CustomerData->email = $request->email;
		if ($request->user_image != '') {
			$path = public_path() . '/uploads/customer/';
			//code for remove old file
			if ($CustomerData->user_image != '' && $CustomerData->user_image != null) {
			$file_old = $path . $CustomerData->user_image;
			if (file_exists($file_old)) {
			unlink($file_old);
			}}
			
		if(!empty($request->user_image)){
			$fileName = time().'_user_image.'.$request->user_image->getClientOriginalExtension();
			$request->user_image->move(public_path('/uploads/customer'), $fileName);
			$CustomerData->user_image = $fileName;
		}}
		// dd($CustomerData);
		$CustomerData->save();
		return redirect()->route('front.dashboard')->with('success', 'Profile Has Been updated successfully');
	}

	public function demos(){
		$demos = Demo::all();
		return view('front.dashboard.demos',compact('demos'));
	}

	public function orders(){
		$orders = Order::all();
		return view('front.dashboard.orders',compact('orders'));
	}

	/**
	 * Himanshu Sharma
	 * Function to send referral link to the customers contacts
	 */
	public function sendReferral(Request $request){
		if($request->email){
			$contactEmail = $request->email;
			$loggedUserData = Auth::user();
			$referralCode = $loggedUserData && $loggedUserData->referral_code ? $loggedUserData->referral_code : '';
			if($referralCode){
				$referralLink = "login/".$referralCode.'/'.$contactEmail;
				Mail::to($contactEmail)->send(new referralMail($referralLink));
				$referralData = [
                    'sent_by' => $loggedUserData && $loggedUserData->id ? $loggedUserData->id : 0,
                    'sent_to_email' => $contactEmail ? $contactEmail : '',
                    'new_user_id'=> 0,
                    'referrer_offer_percentage' => 10,
                    'referee_offer_percentage' => 10,
                    'is_referrer_used' => 0,
                    'is_referee_used'=> 0,
                    'status'=> 1
                ];
                // dd($referralData);
                Referral::create($referralData);
            	return redirect(route("front.dashboard"))->with('successMessage', 'Great ! Your referral link sent successfully.');
			} else {
				return redirect(route("front.dashboard"))->with('errorMessage', "Sorry we couldn't send referral link, please contact to the support.");
			}
		}
	}

}
