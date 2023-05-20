<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class SettingController extends Controller
{
		public function index(){
			$settings = Setting::find(1);
			return view('admin.setting.index',compact('settings'));
			
		}
			/**
			* Show the form for creating a new resource.
			*
			* @return \Illuminate\Http\Response
			*/

		public function create(){
			return view('admin.setting.create');
		}
			/**
			* Store a newly created resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @return \Illuminate\Http\Response
			*/

		public function store(Request $request){
			// dd($request);
			$request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'phone1' =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
			'phone2' =>  'required|numeric|digits:10',
			// 'front_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
			// 'back_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
			// 'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
			'address' => 'required',
			// 'last_login' => 'required',
			// 'facebook_link' => 'required',
			// 'instagram_link' => 'required',
			// 'google_link' => 'required',
			// 'linkedin_link' => 'required',
			// 'pinterest_link' => 'required',
			// 'snapchat_link' => 'required',
			]);
			$settings = new Setting;
			$settings->first_name = $request->first_name;
			$settings->last_name = $request->last_name;
			$settings->email = $request->email;
			$settings->phone1 = $request->phone1;
			$settings->phone2 = $request->phone2;
			$fileName1 = time().'_front_logo.'.$request->front_logo->getClientOriginalExtension();
			$request->front_logo->move(public_path('uploads/settings'), $fileName1);
			$settings->front_logo = $fileName1;
			$fileName2 = time().'_back_logo.'.$request->back_logo->getClientOriginalExtension();
			$request->back_logo->move(public_path('uploads/settings'), $fileName2);
			$settings->back_logo = $fileName2;
			$fileName3 = time().'_profile_picture.'.$request->profile_picture->getClientOriginalExtension();
			$request->profile_picture->move(public_path('uploads/settings'), $fileName3);
			$settings->profile_picture = $fileName3;
			$settings->address = $request->address;
			$settings->last_login = $request->last_login;
			$settings->facebook_link = $request->facebook_link;
			$settings->instagram_link = $request->instagram_link;
			$settings->google_link = $request->google_link;
			$settings->linkedin_link = $request->linkedin_link;
			$settings->pinterest_link  = $request->pinterest_link ;
			$settings->snapchat_link = $request->snapchat_link;
			$settings->twitter_link = $request->twitter_link;
			$settings->themeforest_link = $request->themeforest_link;
			$settings->projects_done = $request->projects_done;
			$settings->satisfied_clients = $request->satisfied_clients;
			$settings->country_numbers = $request->country_numbers;
			$settings->employee_counts = $request->employee_counts;
			$settings->status=1;
			$settings->save();
			// dd($settings);
			return redirect()->route('settingsList')->with('success','Settings has been created successfully.');
		}

			/**
			* Display the specified resource.
			*
			* @param  \App\Setting  $setting
			* @return \Illuminate\Http\Response
			*/

		public function show(Setting $settings){
			return view('setting.show',compact('settings'));
		} 
			/**
			* Show the form for editing the specified resource.
			*
			* @param  \App\Setting  $settings
			* @return \Illuminate\Http\Response
			*/
		public function edit($id){
			$settings = Setting::find($id);
			return view('admin.setting.edit',compact('settings'));
		}

			/**
			* Update the specified resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @param  \App\Setting  $settings
			* @return \Illuminate\Http\Response
			*/

			public function setting_update($id, Request $request){
				$request->validate([
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required',
				'phone1' =>  'required|numeric|digits:10',
				'address' => 'required'
				]);
				$settings = Setting::find($id);
	
				$settings->first_name = $request->first_name ? $request->first_name : '';
				$settings->last_name = $request->last_name ? $request->last_name : '';
				$settings->email = $request->email ? $request->email : '';
				$settings->phone1 = $request->phone1 ? $request->phone1 : '';
				$settings->phone2 = $request->phone2 ? $request->phone2 : '';
				if ($request->front_logo != '') {
					$path = public_path() . '/uploads/settings/';
					//code for remove old file
					if ($settings->front_logo != '' && $settings->front_logo != null) {
					$file_old = $path . $settings->front_logo;
					if (file_exists($file_old)) {
					unlink($file_old);
					}}
					
				if(!empty($request->front_logo)){
					$fileName1 = time().'_front_logo.'.$request->front_logo->getClientOriginalExtension();
					$request->front_logo->move(public_path('uploads/settings'), $fileName1);
					$settings->front_logo = $fileName1;
				}}
				if ($request->header_logo != '') {
					$path = public_path() . '/uploads/settings/';
					//code for remove old file
					if ($settings->header_logo != '' && $settings->header_logo != null) {
					$file_old = $path . $settings->header_logo;
					if (file_exists($file_old)) {
					unlink($file_old);
					}}
					
				if(!empty($request->header_logo)){
					$fileName1 = time().'_header_logo.'.$request->header_logo->getClientOriginalExtension();
					$request->header_logo->move(public_path('uploads/settings'), $fileName1);
					$settings->header_logo = $fileName1;
				}}
				if ($request->back_logo != '') {
					$path = public_path() . '/uploads/settings/';
					//code for remove old file
					if ($settings->back_logo != '' && $settings->back_logo != null) {
					$file_old = $path . $settings->back_logo;
					if (file_exists($file_old)) {
					unlink($file_old);
					}}
				if(!empty($request->back_logo)){
					$fileName2 = time().'_back_logo.'.$request->back_logo->getClientOriginalExtension();
					$request->back_logo->move(public_path('uploads/settings'), $fileName2);
					$settings->back_logo = $fileName2;
				}}
				if ($request->profile_picture != '') {
					$path = public_path() . '/uploads/settings/';
					//code for remove old file
					if ($settings->profile_picture != '' && $settings->profile_picture != null) {
					$file_old = $path . $settings->profile_picture;
					if (file_exists($file_old)) {
					unlink($file_old);
					}
			
					}
				if(!empty($request->front_logo)){
					$fileName3 = time().'_profile_picture.'.$request->profile_picture->getClientOriginalExtension();
					$request->profile_picture->move(public_path('uploads/settings'), $fileName3);
					$settings->profile_picture = $fileName3;
				}}
				$settings->address = $request->address ? $request->address : 'IVth Crossing, 1910, Khejdo Ka Rasta, Chandpole Bazar, Jaipur-302001, Rajasthan, India';
				$settings->last_login = $request->last_login ? $request->last_login : '';
				$settings->facebook_link = $request->facebook_link ? $request->facebook_link : '';
				$settings->instagram_link = $request->instagram_link ? $request->instagram_link : '';
				$settings->google_link = $request->google_link ? $request->google_link : '';
				$settings->linkedin_link = $request->linkedin_link ? $request->linkedin_link : '';
				$settings->twitter_link = $request->twitter_link ? $request->twitter_link : '';
				$settings->whatsapp_no = $request->whatsapp_no ? $request->whatsapp_no : '';
				$settings->projects_done = $request->projects_done ? $request->projects_done : '';
				$settings->satisfied_clients = $request->satisfied_clients ? $request->satisfied_clients : '';
				$settings->country_numbers = $request->country_numbers ? $request->country_numbers : '';
				$settings->employee_counts = $request->employee_counts ? $request->employee_counts : '';
				$settings->save();
				return redirect()->route('settingsList')->with('success','settings Has Been updated successfully');
			}

			/**
			* Remove the specified resource from storage.
			*
			* @param  \App\Setting  $settings
			* @return \Illuminate\Http\Response
			*/

		public function destroy($id){
			$settings = Setting::find($id);
			$settings->delete();
			return redirect()->route('settingsList')->with('success','settings has been deleted successfully');
			}
			public function setting_status($id)
			{
			$settings = Setting::find($id);
			if($settings->status == 1){
			$settings->status = 0;
			} else {
			$settings->status = 1;
			} 
			$settings->save();
			return redirect()->route('settingsList')->with('success','settings has been Status successfully');
		}


}