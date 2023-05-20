<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Demo;
use App\Models\User;
use Mail;
use App\Mail\sendInvitationMail;

class DemosController extends Controller
{
    public function index(){		
		$demos = Demo::orderBy('id', "ASC")->get();
		return view('admin.booking_demo.index', compact('demos'));
	}

	public function sendInvitation(Request $request){
		$link = $request->link ? $request->link : '';
		$demos = $request->demo_ids ? $request->demo_ids : '';
		$demoIds = explode(',', $demos);
		$emails = [];
		$data = [];
		foreach($demoIds as $demo){
			$demoData = Demo::find($demo);
			$demoData->invitation_link = $link;
			$demoData->status = 1;
			if($demoData->save()){
				$customerId = !empty($demoData->customer_id) ? $demoData->customer_id : 0;
				$customerData = User::where('id', $customerId)->where('role', 'customer')->first();
				Mail::to($customerData->email)->send(new sendInvitationMail($customerData, $demoData));
			}
		}
		return redirect()->route('demoList')->with('success', 'Invitation link has been sent successfully.');
	}
}
