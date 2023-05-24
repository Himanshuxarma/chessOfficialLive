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
        
        $courses = Course::where('type','main_course')->where('status',1)->get();
        $academy = Course::where('type','academy_course')->where('status',1)->get();
        $testimonials = Testimonial::where('status',1)->get();
        $aboutPage = Page::where('slug', 'about-us')->first();
        $academyDescription = Page::where('slug', 'academy-description')->first();
        $courseDescription = Page::where('slug', 'course-description')->first();
        $faqs = Faq::where('status',1)->get();
        return view('front.home.index',compact('loginError', 'courses','aboutPage','testimonials','faqs','academy','academyDescription','courseDescription'));
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
}
