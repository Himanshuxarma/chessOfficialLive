<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
class ServicesController extends Controller
{
		public function index(){
			$data['services'] = Service::orderBy('id','ASC')->get();
			return view('admin.service.index', $data);
		}
			/**
			* Show the form for creating a new resource.
			*
			* @return \Illuminate\Http\Response
			*/

		public function create(){
			return view('admin.service.create');
		}
			/**
			* Store a newly created resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @return \Illuminate\Http\Response
			*/
		public function store(Request $request){
			$request->validate([
			'title' => 'required',
			'description' => 'required',
			// 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
			]);
			$services = new Service;
			$services->title = $request->title;
			$services->description = $request->description;
			$fileName = time().'.'.$request->image->getClientOriginalExtension();
			$request->image->move(public_path('uploads/services'), $fileName);
			$services->image = $fileName;
			$services->status=1;
			$services->save();
			return redirect()->route('servicesList')->with('success','Service has been created successfully.');
		}
			/**
			* Display the specified resource.
			*
			* @param  \App\Service  $services
			* @return \Illuminate\Http\Response
			*/

		public function show(Service $services){
			return view('services.show',compact('services'));
		} 
			/**
			* Show the form for editing the specified resource.
			*
			* @param  \App\Service  $services
			* @return \Illuminate\Http\Response
			*/
		public function edit($id){
			$services = Service::find($id);
			return view('admin.service.edit',compact('services'));
		}
			/**
			* Update the specified resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @param  \App\Service  $services
			* @return \Illuminate\Http\Response
			*/
		public function service_update($id, Request $request){
			$request->validate([
				'title' => 'required',
				'description' => 'required'
				]);
				$services = Service::find($id);
				if ($request->image != '') {
					$path = public_path() . '/uploads/services/';
					//code for remove old file
					if ($services->image != '' && $services->image != null) {
					$file_old = $path . $services->image;
					if (file_exists($file_old)) {
					unlink($file_old);
					}
			
					}
			
				if(!empty($request->image)){
				$fileName = time().'.'.$request->image->getClientOriginalExtension();
				$request->image->move(public_path('uploads/services'), $fileName);
				$services->image = $fileName;
				}}
				$services->title = $request->title;
				$services->description = $request->description;
				$services->save();
				return redirect()->route('servicesList')->with('success','Service Has Been updated successfully');
		}
			/**
			* Remove the specified resource from storage.
			*
			* @param  \App\Service  $service
			* @return \Illuminate\Http\Response
			*/
		public function destroy($id){
			$services = Service::find($id);
			$services->delete();
			return redirect()->route('servicesList')->with('success','services has been deleted successfully');
		}
		public function service_status($id){
			$services = Service::find($id);
			if($services->status == 1){
			$services->status = 0;
			} else {
			$services->status = 1;
			} 
			$services->save();
			return redirect()->route('servicesList')->with('success','services has been Status successfully');
		}


}