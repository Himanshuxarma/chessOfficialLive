<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;

class UserDetailController extends Controller
{
    public function index($id){
        $userId =User::find($id);
        dd($userId);
        $data['details'] = UserDetail::orderBy('id','DESC')->get();
        return view('admin.userDetails.index',$data);
    }
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create(){
            $users = User::all();
            return view('admin.userDetails.create',compact('users'));
        }
            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
        public function store(Request $request){
            $request->validate([
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'blood_group' => 'required',
            'profile_image' => 'required',
            'recovery_mobile' => 'required',
            'recovery_email' => 'required',
            'status' => 'required'
            ]);
            $userDetails = new UserDetail;
            $userDetails->user_id = $request->user_id;
            $userDetails->first_name = $request->first_name;
            $userDetails->last_name = $request->last_name;
            $userDetails->dob = $request->dob;
            $userDetails->blood_group = $request->blood_group;
            $fileName = time() . '.' . $request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path('uploads/userDetails'), $fileName);
            $userDetails->profile_image = $fileName;
            $userDetails->recovery_mobile = $request->recovery_mobile;
            $userDetails->recovery_email = $request->recovery_email;
            $userDetails->status = $request->status ? $request->status : 0;
            $userDetails->save();
            return redirect()->route('userDetailsList')->with('success', 'User Details  has been created successfully.');
        }
    
            /**
            * Display the specified resource.
            *
            * @param  \App\UserDetail  $UserDetail
            * @return \Illuminate\Http\Response
            */
            

        public function edit($id){
            $userDetails = UserDetail::find($id);
            return view('admin.userDetails.edit', compact('userDetails'));
        }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  \App\UserDetail  $UserDetail
            * @return \Illuminate\Http\Response
            */

        public function update($id, Request $request){
            $request->validate([
                'user_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'dob' => 'required',
                'blood_group' => 'required',
                'profile_image' => 'required',
                'recovery_mobile' => 'required',
                'recovery_email' => 'required',
                'remember_token' => 'required',
                'status' => 'required'
                ]);
                $userDetails = UserDetail::find($id);
                $userDetails->user_id = $request->user_id;
                $userDetails->first_name = $request->first_name;
                $userDetails->last_name = $request->last_name;
                $userDetails->dob = $request->dob;
                $userDetails->blood_group = $request->blood_group;
                $userDetails->profile_image = $request->profile_image;
                $userDetails->recovery_mobile = $request->recovery_mobile;
                $userDetails->recovery_email = $request->recovery_email;
                $userDetails->remember_token = $request->remember_token;
                $userDetails->status = $request->status ? $request->status : 0;
                $userDetails->save();
            return redirect()->route('userDetailsList')->with('success', 'User Has Been updated successfully');
        }

            /**
            * Remove the specified resource from storage.
            *
            * @param  \App\UserDetail  $userDetails
            * @return \Illuminate\Http\Response
            */

        public function userDetails($id){
            $userDetails = UserDetail::find($id);
            $userDetails->delete();
            return redirect()->route('userDetailsList')->with('success', 'User has been deleted successfully');
        }

        public function userDetails_status($id){
            $userDetails = UserDetail::find($id);
            if ($userDetails->status == 1) {
            $userDetails->status = 0;
            } else {
            $userDetails->status = 1;
            }
            $userDetails->save();
            return redirect()->route('userDetailsList')->with('success', 'User has been Status successfully');
        }
       
}
