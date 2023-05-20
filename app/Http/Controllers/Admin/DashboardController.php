<?php

namespace App\Http\Controllers\Admin;
use Auth;

use App\Models\User;
use App\Models\Page;
use App\Models\Enquiry;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Career;
use App\Models\Demo;
use App\Models\Order;

use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function __construct(){
        // $this->middleware('auth:admin');
        }

        public function index(){
            $enquiry = Enquiry::select('created_at')->get();
            $settings = Setting::count();
            $demoBooking = Demo::select('created_at')->get();
            $orders = Order::select('created_at')->get();
            return view('admin.dashboard.index',compact('enquiry','settings','demoBooking','orders'));
        }
}
?>