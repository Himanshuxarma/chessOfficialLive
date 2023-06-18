<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Mail;
use App\Mail\sendOrderInvitationMail;

class OrderController extends Controller
{
    public function index(){
        $data['orders'] = Order::orderBy('id',"ASC")->get();
		return view('admin.orders.index',$data);
	
    }

    public function sendOrderInvitation(Request $request){
		$link = $request->link ? $request->link : '';
		$orders = $request->order_ids ? $request->order_ids : '';
		$orderIds = explode(',', $orders);
		$emails = [];
		$data = [];
		foreach($orderIds as $order){
			$orderData = Order::find($order);
			$orderData->invitation_link = $link;
			$orderData->status = 1;
			if($orderData->save()){
				$customerId = !empty($orderData->customer_id) ? $orderData->customer_id : 0;
				$customerData = User::where('id', $customerId)->where('role', 'customer')->first();
				Mail::to($customerData->email)->send(new sendOrderInvitationMail($customerData, $orderData));
			}
		}
		return redirect()->route('ordersList')->with('success', 'Invitation link has been sent successfully.');
	}

	/**
	 * Himanshu Sharma
	 * function to lock completed session
	 */
	public function lockSession($orderId = null){
		if($orderId != ""){

		} else {
			
		}
	}


}
