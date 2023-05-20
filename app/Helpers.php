<?php

namespace App\Helpers;
use App\Models\Setting;
use App\Models\CourseFeature;
use App\Models\Banner;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\Country;
use App\Models\CourseOffer;
use Route;
use Session;
use Illuminate\Http\Request;

class Helper {

    public static function helperfunction1(){
        return "helper function 1 response";
    }

    public static function getSettings(){
        $settings= Setting::find(1);
        return $settings;
    }
    public static function getEnquiry(){
        $enquiry= Enquiry::all();
        return $enquiry;
    }
    public static function getUser(){
        $user= User::where('role','admin')->first();
        return $user;
    }
    
    public static function getcourseFeaturedbycourse($courseId){
        $courseFeatured= CourseFeature::where('course_id', $courseId)->get();
        return $courseFeatured;
    }
    public static function getoffersbycourse($courseId){
        $defaultCountryId = Session::get('SiteCountry');
        $offersData = CourseOffer::where('course_id',$courseId)->where('country_id', $defaultCountryId)->where('status', 1)->first();
        return $offersData;
    }

    /**
     * Himanshu Sharma
     * Globally fetching banners
     */
    
    public static function getBanners(){
        
        $bannerType = "home_page";
        // echo Route::current()->getName(); die;
        if(Route::current()->getName() == 'serviceDetails'){
            $bannerType = "service_detail";
        }else if(Route::current()->getName()=='reviewsDetails'){
            $bannerType = "reviews";
        }else if(Route::current()->getName()== 'careersDetails'){
            $bannerType = "careers";
        }else if(Route::current()->getName()== 'projectDetails'){
            $bannerType = "project_detail";
        }
        $banners = Banner::where('page_name',$bannerType)->where('status', 1)->get();
        return $banners;
    }

    public static function getCountry(){
        $countries= Country::where('status','1')->get();
        return $countries;
    }

    public static function getCountryData($countryId){
        return Country::where('id', $countryId)->where('status','1')->first();
    }
}

?>