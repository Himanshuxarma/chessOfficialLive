<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(){
		$data['testimonials'] = Testimonial::orderBy('id', 'ASC')->get();
		return view('admin.testimonial.index', $data);
	}
		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/

    public function create(){
		return view('admin.testimonial.create');
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
		'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
		'rating' => 'required'
		]);
		$testimonials = new Testimonial;
		$testimonials->title = $request->title;
		$testimonials->description = $request->description;
		$fileName = time() . '.' . $request->image->getClientOriginalExtension();
		$request->image->move(public_path('uploads/testimonials'), $fileName);
		$testimonials->image = $fileName;
		$testimonials->rating = $request->rating;
		$testimonials->status = $request->status ? $request->status : 0;
		// dd($testimonials);
		$testimonials->save();
		return redirect()->route('testimonialsList')->with('success', 'Testimonial has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\Testimonial  $testimonials
		* @return \Illuminate\Http\Response
		*/

    public function edit($id){
		$testimonials = Testimonial::find($id);
		return view('admin.testimonial.edit', compact('testimonials'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\Testimonial  $testimonals
		* @return \Illuminate\Http\Response
		*/

    public function update($id, Request $request){
		$request->validate([
		'title' => 'required',
		'description' => 'required',
		'rating' => 'required'
		]);
		$testimonials = Testimonial::find($id);
		if ($request->image != '') {
		$path = public_path() . '/uploads/testimonials/';
		//code for remove old file
		if ($testimonials->image != '' && $testimonials->image != null) {
		$file_old = $path . $testimonials->image;
		if (file_exists($file_old)) {
		unlink($file_old);
		}

		}
		//upload new file
		if(!empty($request->image)){
			$fileName = time() . '.' . $request->image->getClientOriginalExtension();
			$request->image->move(public_path('uploads/testimonials'), $fileName);
			$testimonials->image = $fileName;
			}}
		$testimonials->title = $request->title;
		$testimonials->description = $request->description;
		
		$testimonials->rating = $request->rating;
		$testimonials->status = $request->status ? $request->status : 0;
		$testimonials->save();
		return redirect()->route('testimonialsList')->with('success', 'Testimonial Has Been updated successfully');
	}

		/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Testimonial  $testimonials
		* @return \Illuminate\Http\Response
		*/

    public function destroy($id){
		$testimonials = Testimonial::find($id);
		$testimonials->delete();
		return redirect()->route('testimonialsList')->with('success', 'Testimonial has been deleted successfully');
	}

    public function testimonials_status($id){
		$testimonials = Testimonial::find($id);
		if ($testimonials->status == 1) {
		$testimonials->status = 0;
		} else {
		$testimonials->status = 1;
		}
		$testimonials->save();
		return redirect()->route('testimonialsList')->with('success', 'testimonials has been Status successfully');
	}

}
?>
