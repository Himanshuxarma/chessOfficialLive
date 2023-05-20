<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(){
		$data['faqs'] = Faq::orderBy('id', 'ASC')->get();
		return view('admin.faqs.index', $data);
	}
		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/

    public function create(){
		return view('admin.faqs.create');
	}
		/**
		* Store a newly created resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @return \Illuminate\Http\Response
		*/
    public function store(Request $request){
		$request->validate([
		'question' => 'required',
		'answer' => 'required'
		]);
		$faqs = new Faq;
		$faqs->question = $request->question;
        $faqs->answer = $request->answer;
		$faqs->status = $request->status ? $request->status : 0;
		$faqs->save();
		return redirect()->route('faqsList')->with('success', 'FAQ has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\Faq  $Faq
		* @return \Illuminate\Http\Response
		*/


    public function edit($id){
		$faqs = Faq::find($id);
		return view('admin.faqs.edit', compact('faqs'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\Faq  $Faq
		* @return \Illuminate\Http\Response
		*/

    public function update($id, Request $request){
		$request->validate([
			'question' => 'required',
			'answer' => 'required'
			]);
			$faqs = Faq::find($id);
			$faqs->question = $request->question;
			$faqs->answer = $request->answer;
			$faqs->status = $request->status ? $request->status : 0;
			$faqs->save();
		return redirect()->route('faqsList')->with('success', 'Faq Has Been updated successfully');
	}
	
	/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Faq  $faqs
		* @return \Illuminate\Http\Response
		*/

    public function faqs($id){
		$faqs = Faq::find($id);
		$faqs->delete();
		return redirect()->route('faqsList')->with('success', 'FAQ has been deleted successfully');
	}

    public function faqs_status($id){
		$faqs = Faq::find($id);
		if ($faqs->status == 1) {
		$faqs->status = 0;
		} else {
		$faqs->status = 1;
		}
		$faqs->save();
		return redirect()->route('faqsList')->with('success', 'FAQ has been Status successfully');
	}
}
