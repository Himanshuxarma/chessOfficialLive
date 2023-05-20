<?php

namespace App\Http\Controllers\Front;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\courseCurriculum;

class CourseDetailController extends Controller
{
    public function index($id){
         $courses = Course::find($id);
         $curriculum = CourseCurriculum::where('course_id', $id)->where('status',1)->get();
          return view('front.course_detail.index',compact('courses','curriculum'));
    }

    /**
     * Himanshu Sharma
     * Function to book a demo
     */
    public function bookDemo(Request $request){
        if($request->isMethod('ajax') && $request->ajax()){
            die('himanshu sharma');
            dd($request);
        }
    }

}
