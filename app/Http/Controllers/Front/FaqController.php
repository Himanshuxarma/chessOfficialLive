<?php

namespace App\Http\Controllers\Front;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::where('status',1)->get();
          return view('front.faqs.index',compact('faqs'));
    }
}
