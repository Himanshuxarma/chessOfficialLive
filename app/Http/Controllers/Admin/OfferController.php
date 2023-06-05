<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index(){
		$data['offers'] = Offer::orderBy('id', 'ASC')->get();
		return view('admin.offers.index', $data);
	}
		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/

    public function create(){
		return view('admin.offers.create');
	}
		/**
		* Store a newly created resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @return \Illuminate\Http\Response
		*/
    public function store(Request $request){
        // dd($request);
		$request->validate([
			'title' => 'required',
			'description' => 'required',        
			'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
		]);
		$offers = new Offer;
		$offers->title = $request->title;
        $offers->description = $request->description;        
		$fileName = time() . '.' . $request->image->getClientOriginalExtension();
		$request->image->move(public_path('uploads/offers'), $fileName);
		$offers->image = $fileName;
		$offers->status = $request->status ? $request->status : 0;
		$offers->save();
		return redirect()->route('offersList')->with('success', 'Offer has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\Offer  $Offer
		* @return \Illuminate\Http\Response
		*/


    public function edit($id){
		$offers = Offer::find($id);
		return view('admin.offers.edit', compact('offers'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\Offer  $Offer
		* @return \Illuminate\Http\Response
		*/

    public function update($id, Request $request){
		$request->validate([
			'title' => 'required',
		    'description' => 'required'
			]);
			$offers = Offer::find($id);
            if ($request->image != '') {
                $path = public_path() . '/uploads/offers/';
                //code for remove old file
                if ($offers->image != '' && $offers->image != null) {
                $file_old = $path . $offers->image;
                if (file_exists($file_old)) {
                unlink($file_old);
                }}
                //upload new file
                if(!empty( $request->image)){
                $fileName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/offers'), $fileName);
                $offers->image = $fileName;
                }}
			$offers->title = $request->title;
			$offers->description = $request->description;
			$offers->status = $request->status ? $request->status : 0;
			$offers->save();
		return redirect()->route('offersList')->with('success', 'Offer Has Been updated successfully');
	}
	
	/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Offer  $offers
		* @return \Illuminate\Http\Response
		*/

    public function offers($id){
		$offers = Offer::find($id);
		$offers->delete();
		return redirect()->route('offersList')->with('success', 'Offer has been deleted successfully');
	}

    public function offers_status($id){
		$offers = Offer::find($id);
		if ($offers->status == 1) {
		$offers->status = 0;
		} else {
		$offers->status = 1;
		}
		$offers->save();
		return redirect()->route('offersList')->with('success', 'Offer has been Status successfully');
	}
}
