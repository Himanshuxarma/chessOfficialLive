<?php

namespace App\Http\Controllers\Front;
use Auth;
use Mail;
use App\Mail\ContactMail;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;	
use App\Models\Page;	
use App\Models\Service;	
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Employee;
use App\Rules\ReCaptcha;


class EnquiriesController extends Controller{

    public function __construct(){
        // $this->middleware('auth:admin');
    }

	/**
	* 	Ramesh Singh
	*	Function to render Enquiry and it's content Enquiry dynamically
	*/
    public function index(){
		
        return view('front.pages.enquiries');
    }

	/**
	* 	Ramesh Singh
	*	Function to render Enquiry  Store and it's content Enquiry dynamically
	*/
	public function sendEmail(Request $request){
			$request->validate([
			'full_name' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'subject' => 'required',
			'message' => 'required',
			'g-recaptcha-response' => ['required', new ReCaptcha]
		]);
		$contacts = new Enquiry;
		$contacts->full_name = $request->full_name;
		$contacts->email = $request->email;
		$contacts->phone = $request->phone;
		$contacts->subject = $request->subject;
		$contacts->message = $request->message;
		if($contacts->save()){
			Mail::to('admin@w3esolutions.com')->send(new ContactMail($contacts));
			if(isset($request->contact_type) && !empty($request->contact_type) && $request->contact_type=="subscription"){
				return redirect()->route('home')->with('success', 'Your subscription has been captured successfully.');
			} else {
				return redirect()->route('contactForm')->with('success', 'Your Enquiry has been sent, We will contact you soon.');
			}
		} else {
			if(isset($request->contact_type) && !empty($request->contact_type) && $request->contact_type=="subscription"){
				return redirect()->route('home')->with('success', 'Your subscription has been captured successfully.');
			} else {
				return redirect()->route('contactForm')->with('error', 'Something went wrong.');
			}
		}
		
	}
}