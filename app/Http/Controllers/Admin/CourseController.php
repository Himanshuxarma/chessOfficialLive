<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Country;
use App\Models\Offer;
use App\Models\CoursePrice;
use App\Models\CourseFeature;
use App\Models\CourseCurriculum;

class CourseController extends Controller
{
    public function index(){
		$data['course'] = Course::orderBy('id', 'ASC')->get();
		return view('admin.course.index', $data);
	}
		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/

    public function create(){
		return view('admin.course.create');
	}
		/**
		* Store a newly created resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @return \Illuminate\Http\Response
		*/
    public function store(Request $request){
		$request->validate([
		'type' => 'required',
		'title' => 'required',
		'featured' => 'required',
		'class' => 'required',
		'price' => 'required',
		'age' => 'required',
		'batch' => 'required',
		'hrs_training' => 'required',
		'format' => 'required',
		'duration' => 'required',
		'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
		'description' => 'required'
		]);
		$course = new Course;
		$course->type = $request->type;
        $course->title = $request->title;
        $course->featured = $request->featured;
        $course->class = $request->class;
		$course->price = $request->price;
		$course->age = $request->age;
		$course->batch = $request->batch;
		$course->hrs_training = $request->hrs_training;
		$course->format = $request->format;
		$course->duration = $request->duration;
		$fileName = time() . '.' . $request->image->getClientOriginalExtension();
		$request->image->move(public_path('uploads/course'), $fileName);
		$course->image = $fileName;
		$course->description = $request->description;
		$course->status = $request->status ? $request->status : 0;
		$course->save();
		return redirect()->route('coursesList')->with('success', 'Course has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\Course  $Course
		* @return \Illuminate\Http\Response
		*/


    public function edit($id){
		$course = Course::find($id);
		return view('admin.course.edit', compact('course'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\Course  $Course
		* @return \Illuminate\Http\Response
		*/

    public function update($id, Request $request){
		$request->validate([
			'type' => 'required',
		'title' => 'required',
		'featured' => 'required',
		'class' => 'required',
		'price' => 'required',
		'age' => 'required',
		'batch' => 'required',
		'hrs_training' => 'required',
		'format' => 'required',
		'duration' => 'required',
		'description' => 'required'
			]);
			$course = Course::find($id);
			if ($request->image != '') {
				$path = public_path() . '/uploads/course/';
				//code for remove old file
				if ($course->image != '' && $course->image != null) {
				$file_old = $path . $course->image;
				if (file_exists($file_old)) {
				unlink($file_old);
				}}
				//upload new file
				if(!empty( $request->image)){
				$fileName = time() . '.' . $request->image->getClientOriginalExtension();
				$request->image->move(public_path('uploads/course'), $fileName);
				$course->image = $fileName;
				}}
            $course->type = $request->type;
            $course->title = $request->title;
            $course->featured = $request->featured;
            $course->class = $request->class;
            $course->price = $request->price;
            $course->age = $request->age;
            $course->batch = $request->batch;
            $course->hrs_training = $request->hrs_training;
            $course->format = $request->format;
            $course->duration = $request->duration;
            $course->description = $request->description;
            $course->status = $request->status ? $request->status : 0;
			$course->save();
		return redirect()->route('coursesList')->with('success', 'Course Has Been updated successfully');
	}

		/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Course  $course
		* @return \Illuminate\Http\Response
		*/

    public function destroy($id){
		$course = Course::find($id);
		$course->delete();
		return redirect()->route('coursesList')->with('success', 'Course has been deleted successfully');
	}

    public function courses_status($id){
		$course = Course::find($id);
		if ($course->status == 1) {
		$course->status = 0;
		} else {
		$course->status = 1;
		}
		$course->save();
		return redirect()->route('coursesList')->with('success', 'Course has been Status successfully');
	}

	/**
	 * Himanshu Sharma
	 * Function to add or update the prices of the course in all the countries
	 */
	public function course_prices(Request $request, $courseId){
		if($request && $courseId){
			$courseDetails = Course::find($courseId);
			$coursePrices = CoursePrice::where('course_id', $courseId)->get();
			$countries = Country::where('status', 1)->pluck('country', 'id');
			return view('admin.course.country_prices', compact('courseDetails', 'countries', 'courseId','coursePrices'));
		}
	}

	/**
	 * Himanshu Sharma
	 * Function to store prices of course for multiple or all the active countries
	 */
	public function store_course_prices(Request $request){
		if($request){
			$data = [];
			foreach($request->country_id as $key=>$postData){
				$countryCurrency = Country::find($postData);
				$data[] = [
					'course_id'=>!empty($request->course_id) ? $request->course_id : '',
					'country_id'=>!empty($postData) ? $postData : '',
					'currency'=> !empty($countryCurrency) && !empty($countryCurrency->currency) ? $countryCurrency->currency : '₹',
					'first_price'=>!empty($request->first_price[$key]) ? $request->first_price[$key] : 0,
					'second_price'=>!empty($request->second_price[$key]) ? $request->second_price[$key] : 0,
					'status'=>!empty($request->status[$key]) ? $request->status[$key] : 0
				];
			}
			if(!empty($data)){
				// dd($data);
			    CoursePrice::where('course_id', $request->course_id)->delete();
    			if(CoursePrice::insert($data)){
    				return redirect()->route('coursesList')->with('success', 'Course Prices for countries have been saved successfully.');
    			} else {
    				return redirect()->route('coursesList')->with('error', 'Something went wrong.');
    			}
			}
		}
	}

	public function course_featured($id){	
		$courseData = Course::find($id);
		$courseFeatured = CourseFeature::where('course_id', $id)->get();
		return view('admin.course.course_featured', compact('courseData','courseFeatured'));
	}

	public function store_course_featured(Request $request){
		if($request){
			$data = [];
			// dd($request);
			foreach($request['data'] as $postData){
				// dd($postData);
				$data[] = [
					'course_id'=>$request->course_id,
					'feature'=>isset($postData['feature']) && !empty($postData['feature']) ? $postData['feature'] : '',
					'status'=>isset($postData['status']) && !empty($postData['status']) ? $postData['status'] : 0
				];
			}
			// dd($data);
			if(!empty($data)){
				CourseFeature::where('course_id', $request->course_id)->delete();
				if(CourseFeature::insert($data)){
					return redirect()->route('coursesList')->with('success', 'Course Featured have been saved successfully.');
				} else {
					return redirect()->route('coursesList')->with('error', 'Something went wrong.');
				}
			}
		}
	}

	public function course_curriculum($id){
		$courseData = Course::find($id);
		$courseCurriculum = CourseCurriculum::where('course_id', $id)->get();
		return view('admin.course.course_curriculum', compact('courseData','courseCurriculum'));
	}

	public function store_course_curriculum(Request $request){
		if($request){
			$data = [];
			foreach($request['data'] as $key=>$postData){
				$carriculamData = CourseCurriculum::find($postData['course_carriculam_id']);
				if (!empty($postData['image'])) {
					$path = public_path() . '/uploads/course_curriculum';
					//code for remove old file
					// die('hiii idher aaya');
					if ($postData['image'] != '' && $postData['image'] != null) {
						$file_old = $path . $postData['image'];
						if (file_exists($file_old)) {
							unlink($file_old);
						}
					}
					$fileName = time().'_'.$key.'.' . $postData['image']->getClientOriginalExtension();
					$postData['image']->move(public_path('/uploads/course_curriculum'), $fileName);
					$postData['image'] = $fileName;
				} else {
					$postData['image'] = !empty($carriculamData->image) && !empty($carriculamData->image) ? $carriculamData->image : '';
				}
				$data[] = [
					'course_id'=>$request->course_id,
					'title'=>isset($postData['title']) && !empty($postData['title']) ? $postData['title'] : '',
					'description'=>isset($postData['description']) && !empty($postData['description']) ? $postData['description'] : '',
					'image'=>isset($postData['image']) && !empty($postData['image']) ? $postData['image'] : '',
					'status'=>isset($postData['status']) && !empty($postData['status']) ? $postData['status'] : 0,
				];
				// echo '<pre>'; print_r($postData);
				//dd($data);
				
			}
			// dd($data);
			if(!empty($data)){
				CourseCurriculum::where('course_id', $request->course_id)->delete();
				if(CourseCurriculum::insert($data)){
					return redirect()->route('coursesList')->with('success', 'Course Curriculum have been saved successfully.');
				} else {
					return redirect()->route('coursesList')->with('error', 'Something went wrong.');
				}
			}
		}
	}
}

