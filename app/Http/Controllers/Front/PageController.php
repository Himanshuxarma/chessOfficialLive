<?php

namespace App\Http\Controllers\Front;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Course;


class pageController extends Controller
{
   
  
    public function guidelines(){
        $guidelines = Page::where('slug', 'class-guidlines')->first();
          return view('front.pages.guidelines',compact('guidelines'));
    }
    public function terms_conditions(){
        $terms_conditions = Page::where('slug', 'terms-conditions')->first();
        return view('front.pages.terms_conditions',compact('terms_conditions'));
    }
    public function privacy_policy(){
        $policy = Page::where('slug', 'privacy-policy')->first();
          return view('front.pages.privacy_policy',compact('policy'));
    }
    public function about_us(){
      $courses = Course::where('status',1)->get();
      $countries = Country::where('status',1)->get();
      $aboutUs = Page::where('slug', 'about-us')->first();
      return view('front.pages.about_us',compact('aboutUs','courses','countries'));
    }

    public function chess_official_academy(){
      $chessOfficialAcademy = Page::where('slug', 'chessofficial-group-sessions')->first();
      return view('front.pages.chess_official_academy',compact('chessOfficialAcademy'));
    }
}
