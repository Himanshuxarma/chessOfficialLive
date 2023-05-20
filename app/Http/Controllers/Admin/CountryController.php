<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\Models\Country;
use App\Models\CountryTimezone;

class CountryController extends Controller
{
    public function index(){
		$data['country'] = Country::orderBy('id', 'ASC')->paginate(20);
		return view('admin.country.index', $data);
	}
		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/

    public function create(){
		return view('admin.country.create');
	}
		/**
		* Store a newly created resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @return \Illuminate\Http\Response
		*/
    public function store(Request $request){
		$request->validate([
		'country' => 'required',
		'country_code' => 'required'
		]);
		$country = new Country;
		$country->country = $request->country;
        $country->country_code = $request->country_code;
		$fileName = time() . '.' . $request->country_flag->getClientOriginalExtension();
		$request->country_flag->move(public_path('uploads/country'), $fileName);
		$country->country_flag = $fileName;
		$country->status = $request->status ? $request->status : 0;
		$country->save();
		return redirect()->route('countryList')->with('success', 'Country has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\Country  $Country
		* @return \Illuminate\Http\Response
		*/


    public function edit($id){
		$country = Country::find($id);
		return view('admin.country.edit', compact('country'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\Country  $Country
		* @return \Illuminate\Http\Response
		*/

    public function update($id, Request $request){
		$request->validate([
			'country' => 'required',
			'country_code' => 'required'
			]);
			$country = Country::find($id);
			if ($request->country_flag != '') {
				$path = public_path() . '/uploads/country/';
				//code for remove old file
				if ($country->country_flag != '' && $country->country_flag != null) {
				$file_old = $path . $country->country_flag;
				if (file_exists($file_old)) {
				unlink($file_old);
				}}
				//upload new file
				if(!empty( $request->country_flag)){
				$fileName = time() . '.' . $request->country_flag->getClientOriginalExtension();
				$request->country_flag->move(public_path('uploads/country'), $fileName);
				$country->country_flag = $fileName;
				}}
			$country->country = $request->country;
			$country->country_code = $request->country_code;
			$country->status = $request->status ? $request->status : 0;
			$country->save();
		return redirect()->route('countryList')->with('success', 'Country Has Been updated successfully');
	}

		/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Country  $country
		* @return \Illuminate\Http\Response
		*/

    public function country($id){
		$country = Country::find($id);
		$country->delete();
		return redirect()->route('countryList')->with('success', 'Country has been deleted successfully');
	}

    public function country_status($id){
		$country = Country::find($id);
		if ($country->status == 1) {
		$country->status = 0;
		} else {
		$country->status = 1;
		}
		$country->save();
		return redirect()->route('countryList')->with('success', 'Country has been Status successfully');
	}

	public function TimeZoneList($countryId=null){
		$data['countryId']= $countryId;
		$data['timezone'] = CountryTimezone::where('country_id',$countryId)->orderBy('id', 'ASC')->paginate(20);
		// dd($data);
		return view('admin.country.TimeZoneList',$data);
	}
	public function timezonecreate($countryId=null){
		return view('admin.country.timezonecreate',compact('countryId'));
	}
		/**
		* Store a newly created resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @return \Illuminate\Http\Response
		*/
    public function timezonestore(Request $request){
		// dd($request);
		$request->validate([
		'timezone' => 'required'
		]);
		$TimeZone = new CountryTimezone;
		$countryId= $TimeZone->country_id = $request->country_id;
        $TimeZone->timezone = $request->timezone;
		$TimeZone->status = $request->status ? $request->status : 0;
		$TimeZone->save();
		return redirect()->route('timezone.List',$countryId)->with('success', 'TimeZone has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\CountryTimezone  $Country
		* @return \Illuminate\Http\Response
		*/


    public function timezoneedit($id){
		$TimeZoneData = CountryTimezone::find($id);
		return view('admin.country.timezoneedit', compact('TimeZoneData'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\CountryTimezone  $Country
		* @return \Illuminate\Http\Response
		*/

    public function timezoneupdate($id, Request $request){
		$request->validate([
			'timezone' => 'required'
			]);
			$TimeZone = CountryTimezone::find($id);
			$countryId = $TimeZone->country_id = $request->country_id ? $request->country_id : 0; 
			$TimeZone->timezone = $request->timezone;
			$TimeZone->status = $request->status ? $request->status : 0;
			$TimeZone->save();
		return redirect()->route('timezone.List',$countryId)->with('success', 'TimeZone Has Been updated successfully');
	}

		/**
		* Remove the specified resource from storage.
		*
		* @param  \App\CountryTimezone  $country
		* @return \Illuminate\Http\Response
		*/

    public function timezonedelete($id){
		$TimeZone = CountryTimezone::find($id);
		$countryId = !empty($TimeZone) && $TimeZone->country_id ? $TimeZone->country_id : 0;
		$TimeZone->delete();
		return redirect()->route('timezone.List',$countryId)->with('success', 'TimeZone has been deleted successfully');
	}

    public function timezone_status($id){
		// dd($id);
		$TimeZone = CountryTimezone::find($id);
		$countryId = !empty($TimeZone) && $TimeZone->country_id ? $TimeZone->country_id : 0;
		if ($TimeZone->status == 1) {
		$TimeZone->status = 0;
		} else {
		$TimeZone->status = 1;
		}
		$TimeZone->save();
		return redirect()->route('timezone.List',$countryId)->with('success', 'TimeZone has been Status successfully');
	}
}
