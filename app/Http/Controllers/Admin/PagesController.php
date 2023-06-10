<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct(){
        // $this->middleware('auth:admin');
    }

    public function index(){
		$data['pages'] = Page::orderBy('id', 'ASC')->get();
		return view('admin.page.index', $data);
	}
		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/

    public function create(){
		return view('admin.page.create');
	}
		/**
		* Store a newly created resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @return \Illuminate\Http\Response
		*/
    public function store(Request $request){
		$request->validate([
		'title' => 'required',
		'slug' => 'required',
		'description' => 'required'
		]);
		$pages = new Page;
		$pages->title = $request->title;
		$pages->slug = $request->slug;
		$pages->description = $request->description;
		if(!empty($request->banner_image)){
			$fileName = time() . '.' . $request->banner_image->getClientOriginalExtension();
			$request->banner_image->move(public_path('uploads/pages'), $fileName);
			$pages->banner_image = $fileName;
		} else {
			$pages->banner_image = '';	
		}
		
		$pages->status = $request->status ? $request->status : 0;
		
		$pages->save();
		return redirect()->route('pageList')->with('success', 'Page has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\Page  $page
		* @return \Illuminate\Http\Response
		*/

    public function show(Page $page){
		return view('page.show', compact('page'));
	}

		/**
		* Show the form for editing the specified resource.
		*
		* @param  \App\Page  $page
		* @return \Illuminate\Http\Response
		*/

    public function edit($id){
		$pages = Page::find($id);
		return view('admin.page.edit', compact('pages'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\Page  $page
		* @return \Illuminate\Http\Response
		*/

    public function update($id, Request $request){
		$request->validate([
			'title' => 'required',
			'slug' => 'required',
			'description' => 'required'
			]);
			$pages = Page::find($id);
			if ($request->banner_image != '') {
			$path = public_path() . '/uploads/pages/';
			//code for remove old file
			if ($pages->banner_image != '' && $pages->banner_image != null) {
			$file_old = $path . $pages->banner_image;
			if (file_exists($file_old)) {
			unlink($file_old);
			}}
			//upload new file
			if(!empty( $request->banner_image)){
			$fileName = time() . '.' . $request->banner_image->getClientOriginalExtension();
			$request->banner_image->move(public_path('uploads/pages'), $fileName);
			$pages->banner_image = $fileName;
			}}
			$pages->title = $request->title;
			$pages->slug = $request->slug;
			$pages->description = $request->description;
			$pages->status = $request->status ? $request->status : 0;
			$pages->save();
			return redirect()->route('pageList')->with('success', 'Page Has Been updated successfully');
	}

		/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Page  $page
		* @return \Illuminate\Http\Response
		*/

    public function destroy($id){
		$pages = Page::find($id);
		$pages->delete();
		return redirect()->route('pageList')->with('success', 'Page has been deleted successfully');
	}

    public function page_status($id){
		$pages = Page::find($id);
		if ($pages->status == 1) {
		$pages->status = 0;
		} else {
		$pages->status = 1;
		}
		$pages->save();
		return redirect()->route('pageList')->with('success', 'pages has been Status successfully');
	}


}