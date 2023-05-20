<?php

namespace App\Http\Controllers\Front;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Demo;

class DashboardController extends Controller
{
  
  	public function index(){
		if(Auth::guard('customer')->check()){
      		return view('front.dashboard.index');
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

  	public function update($id,Request $request){
		$request->validate([
			// 'full_name' => 'required',
			// 'country' => 'required',
			// 'state' => 'required',
			// 'city' => 'required',
			// 'address' => 'required',
			// 'dob' => 'required',
			// 'phone' => 'required',
			// 'email ' => 'required'
			]);
			// dd("singh");
			$CustomerData = User::find($id);
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
		return redirect()->route('webuser.profile')->with('success', 'Profile Has Been updated successfully');
	}

	public function demos(){
		$demos = Demo::all();
		return view('front.dashboard.demos',compact('demos'));
	}

	public function orders(){
		$orders = Order::all();
		return view('front.dashboard.orders',compact('orders'));
	}

}
