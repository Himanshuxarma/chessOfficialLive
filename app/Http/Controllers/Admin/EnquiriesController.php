<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;	

class EnquiriesController extends Controller{
	
    public function index(){		
		$data['contacts'] = Enquiry::orderBy('id')->get();
		return view('admin.enquiries.index',$data);
	}
	
	public function destroy($id){
		$enquiry = Enquiry::find($id);
		$enquiry->delete();
		return redirect()->route('enquiriesList')->with('success', 'Enquiry has been deleted successfully');
	}

		

}
