<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Controllers\Controller;

class BannersController extends Controller{

  	 public function index(){	
		$data['banners'] = Banner::orderBy('id', 'ASC')->paginate(10);
		return view('admin.banners.index', $data);
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/

   	public function create(){
		return view('admin.banners.create');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/

    public function store(Request $request){
		$request->validate([
		'banner_title' => 'required',
		'page_name' => 'required',
		'banner_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
		'status' => 'required'
		]);
		$banners = new Banner;
		$banners->banner_title = $request->banner_title;
		$banners->page_name = $request->page_name;
		$fileName = time() . '.' . $request->banner_image->getClientOriginalExtension();
		$request->banner_image->move(public_path('/uploads/banners'), $fileName);
		$banners->banner_image = $fileName;
		$banners->status = $request->status;
		dd($banners);
		$banners->save();
		return redirect()->route('bannersList')->with('success', 'Banner has been created successfully.');
	}

		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Category  $product
		 * @return \Illuminate\Http\Response
		 */

		public function edit($id){
			$banners = Banner::find($id);
			return view('admin.banners.edit', compact('banners'));
		}

			/**
			 * Update the specified resource in storage.
			 *
			 * @param  \Illuminate\Http\Request  $request
			 * @param  \App\Category  $product
			 * @return \Illuminate\Http\Response
			 */	
				
		public function update(Request $request){
			$request->validate([
				'banner_title' => 'required',
				'page_name' => 'required',
				// 'banner_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
				]);
				$bannerId = $request->id ? $request->id : 0;
				$banners = Banner::find($bannerId);
				if ($request->banner_image != '') {
				$path = public_path() . '/uploads/banners/';
				//code for remove old file
				if ($banners->banner_image != '' && $banners->banner_image != null) {
				$file_old = $path . $banners->banner_image;
				if (file_exists($file_old)) {
				unlink($file_old);
				}
				}
				//upload new file
				if(!empty($request->banner_image)){
				$fileName = time() . '.' . $request->banner_image->getClientOriginalExtension();
				$request->banner_image->move(public_path('/uploads/banners'), $fileName);
				$banners->banner_image = $fileName;
				}}
				$banners->banner_title = $request->banner_title;
				$banners->page_name = $request->page_name;
				
				$banners->save();		
				return redirect()->route('bannersList')->with('success', 'Banner Has Been updated successfully');
		}
			/**
			* Remove the specified resource from storage.
			*
			* @param  \App\Category  $product
			* @return \Illuminate\Http\Response
			*/

		public function destroy($id){
			$banners = Banner::find($id);
			$banners->delete();
			return redirect()->route('bannersList')->with('success', 'Banner has been deleted successfully');
		}

   		 public function banner_status($id){
			$banners = Banner::find($id);
			if ($banners->status == 1) {
				$banners->status = 0;
			} else {
				$banners->status = 1;
			}
			$banners->save();
			return redirect()->route('bannersList')->with('success', 'Banner has been Status successfully');
		}
}
