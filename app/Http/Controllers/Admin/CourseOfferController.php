<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\CourseOffer;
use App\Models\Offer;
use App\Models\Country;

class CourseOfferController extends Controller
{
    public function index($courseId=null){
        $data['courseId'] = $courseId;
        $data['CourseOffer'] = CourseOffer::where('course_id', $courseId)->orderBy('id', 'ASC')->paginate(10);
        return view('admin.course_offers.index', $data);
    }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        	
   		 public function create($courseId=null){
            $offers = Offer::all();
            $country = Country::all();
			return view('admin.course_offers.create', compact('courseId','offers','country'));
		}
			/**
			* Store a newly created resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @return \Illuminate\Http\Response
			*/
		public function store(Request $request){
			$request->validate([
				'amount' => 'required',
				'start' => 'required',
				'end' => 'required'
			]);
			$courseoffers = new CourseOffer;
			$courseId = $courseoffers->course_id = $request->course_id ? $request->course_id : ''; 
			$courseoffers->offer_id = $request->offer_id ? $request->offer_id : '';
			$courseoffers->country_id = $request->country_id ? $request->country_id : '';
			$courseoffers->amount = $request->amount ? $request->amount : '';
			$courseoffers->start = $request->start ? $request->start : '';
			$courseoffers->end = $request->end ? $request->end : '';
			$courseoffers->status = $request->status ? $request->status : 0;
			$courseoffers->save();
			return redirect()->route('Course.Offers.list', $courseId)->with('success', 'Course Offer has been created successfully.');
		}
			
			/**
			* Show the form for editing the specified resource.
			*
			* @param  \App\CourseOffer  $CourseOffer
			* @return \Illuminate\Http\Response
			*/
		public function edit($id){
            $offers = Offer::all();
            $country = Country::all();
			$courseoffers = CourseOffer::find($id);
			return view('admin.course_offers.edit', compact('courseoffers','offers','country'));
		}
			/**
			 * Update the specified resource in storage.
			 *
			 * @param  \Illuminate\Http\Request  $request
			 * @param  \App\CourseOffer  $product
			 * @return \Illuminate\Http\Response
			 */
		public function update($id, Request $request){
			$request->validate([
				'amount' => 'required',
				'start' => 'required',
				'end' => 'required'
				]);
				$courseoffers = CourseOffer::find($id);
                $courseId = $courseoffers->course_id = $request->course_id ? $request->course_id : ''; 
                $courseoffers->offer_id = $request->offer_id ? $request->offer_id : '';
                $courseoffers->country_id = $request->country_id ? $request->country_id : '';
                $courseoffers->amount = $request->amount ? $request->amount : '';
                $courseoffers->start = $request->start ? $request->start : '';
                $courseoffers->end = $request->end ? $request->end : '';
                $courseoffers->status = $request->status ? $request->status : 0;
				$courseoffers->save();
				return redirect()->route('Course.Offers.list', $courseId)->with('success', ' Course Offer  Has Been updated successfully');
		}

			/**
			* Remove the specified resource from storage.
			*
			* @param  \App\CourseOffer  $product
			* @return \Illuminate\Http\Response
			*/

		public function destroy($id){
			$courseoffers = CourseOffer::find($id);
            $courseId = !empty($courseoffers) && $courseoffers->course_id ? $courseoffers->course_id : 0;
			$courseoffers->delete();
			return redirect()->route('Course.Offers.list',$courseId)->with('success', 'Course Offer has been deleted successfully');
		}

		public function status($id){
			$courseoffers = CourseOffer::find($id);
            $courseId = !empty($courseoffers) && $courseoffers->course_id ? $courseoffers->course_id : 0;
			if ($courseoffers->status == 1) {
			    $courseoffers->status = 0;
			} else {
			    $courseoffers->status = 1;
			}
			$courseoffers->save();
			return redirect()->route('Course.Offers.list', $courseId)->with('success', 'Course Offer has been Status successfully');
		}

        
		/**
		 * Himanshu Sharma
		 * Function to check the country if offer already added for the selected course or not
		 */
		public function checkOfferCountry(Request $request){
			$data = [];
			if($request->isMethod('post') && $request->ajax()){
				$countryId = $request->country_id ? $request->country_id : 0;
				$offerId = $request->offer_id ? $request->offer_id : 0;
				$courseId = $request->course_id ? $request->course_id : 0;
				$alreadyExists = CourseOffer::where('offer_id', $offerId)->where('country_id', $countryId)->where('course_id', $courseId)->first();
				if($alreadyExists){
					$data['status'] = true; 
				} else {
					$data['status'] = false;
				}
			} else {
				$data['status'] = false;
				$data['message'] = 'Invalid request';
			}
			echo json_encode($data);
		}
}
