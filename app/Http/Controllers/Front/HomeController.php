<?php
namespace App\Http\Controllers\Front;
use Auth;
use Session;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Page;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Country;
use App\Models\CourseFeature;

class HomeController extends Controller
{
    public function __construct(){
        $countryData = Country::where('id', 6)->where('status', 1)->first();
        $countryId = !empty($countryData) && $countryData->id ? $countryData->id : 6 ;
        Session::put('SiteCountry', $countryId);
        // $this->middleware('auth:admin');
    }
	
	/**
	* 	Ramesh Singh
	*	Function to render homepage and it's content dynamically
	*/

    public function index(){
        $loginError = "";
        if(Session::get('loginError')){
            $loginError = Session::get('loginError');   
        } 
        if(Session::has('SiteCountry')){
            $defaultCountry = Session::get('SiteCountry');
        } else {
            $defaultCountry = 6;
        }
        $country = Country::all();
        $mainCourses = Course::where('type','main_course')->where('status',1)->limit(3)->get();
        $academiCourses = Course::where('type','academy_course')->where('status',1)->limit(3)->get();
        $academy = Course::where('type','academy_course')->where('status',1)->get();
        $testimonials = Testimonial::where('status',1)->get();
        $aboutPage = Page::where('slug', 'about-us')->first();
        $academyDescription = Page::where('slug', 'academy-description')->first();
        $courseDescription = Page::where('slug', 'course-description')->first();
        $faqs = Faq::where('status',1)->get();
        return view('front.home.index',compact('loginError', 'mainCourses', 'academiCourses', 'country', 'aboutPage','testimonials','faqs','academy','academyDescription','courseDescription'));
    }

    /**
     * Himanshu Sharma
     * Set default country
     */
    public function setCountry(Request $request){
        if($request->isMethod('get') && $request->ajax()){
            $countryId = $request->country_id ? $request->country_id : '';
            Session::put('SiteCountry', $countryId);
            $countryDetails = Country::where("id", $countryId)->where('status', 1)->first();
            $data = ['status'=>true, 'data'=>$countryDetails];
        } else {
            $data = ['status'=>false];
        }
        return response()->json($data);
    }


    /**
     * Himanshu Sharma
     * Function to store reviews posted from the home page testimonial section
     */
    public function storeReview(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'country_id' => 'required',
            'description' => 'required'
        ]);
        // dd($request);
        $review = new Testimonial;
		$review->title = $request->title;
		$review->country_id = $request->country_id;
		$fileName = time() . '.' . $request->image->getClientOriginalExtension();
		$request->image->move(public_path('/uploads/testimonials'), $fileName);
		$review->image = $fileName;
        $review->rating = 0;
		$review->description = $request->description;
		// dd($review);
		if($review->save()){
            return redirect()->route('home')->with('success', 'Review saved successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Something went wrong.');
        }

    }
    public function testimonial_details($id){
        $testimonialsDetails = Testimonial::find($id);
        $testimonials = Testimonial::where('status',1)->get();
        $country = Country::all();
        return view('front.testimonialDetails.index',compact('testimonialsDetails','testimonials', 'country'));
    }

}
