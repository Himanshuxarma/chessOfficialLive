<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
       
        $data['users'] = User::where('role','customer')->orderBy('id','DESC')->get();
        return view('admin.users.index',$data);

    }
        
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create(){
            $roles = Role::all();
            return view('admin.users.create',compact('roles'));
        }

        public function edit($id){
            $users = User::find($id);
            $roles = Role::all();
            return view('admin.users.edit', compact('users','roles'));
        }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  \App\User  $User
            * @return \Illuminate\Http\Response
            */

        public function update($id, Request $request){
            $request->validate([
                'role_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'account_type' => 'required',
                'password' => 'required',
                'verification_code' => 'required',
                'email_verified_at' => 'required',
                'remember_token' => 'required',
                'is_verified' => 'required'
                ]);
                $users = User::find($id);
                $users->role_id = $request->role_id;
                $users->name = $request->name;
                $users->email = $request->email;
                $users->account_type = $request->account_type;
                $users->password = $request->password;
                $users->verification_code = $request->verification_code;
                $users->email_verified_at = $request->email_verified_at;
                $users->remember_token = $request->remember_token;
                $users->is_verified = $request->is_verified ? $request->is_verified : 0;
                $users->save();
            return redirect()->route('usersList')->with('success', 'User Has Been updated successfully');
        }

            /**
            * Remove the specified resource from storage.
            *
            * @param  \App\User  $users
            * @return \Illuminate\Http\Response
            */

        public function destroy ($id){
            $users = User::find($id);
            $users->delete();
            return redirect()->route('usersList')->with('success', 'Customer has been deleted successfully');
        }
            
        public function profile(){
			$userprofile = User::where('role','admin')->first();
			return view('admin.users.profile',compact('userprofile'));
		}
        
		public function profile_update($id, Request $request){
            // dd($request);
			$request->validate([
			'full_name' => 'required',
			'country' => 'required',
			'state' => 'required',
			'city' => 'required',
			'address' => 'required',
			'dob' => 'required',
			'phone' =>  'required|numeric|digits:10',
			'email' => 'required',
			]);
			$users = User::find($id);
			$users->full_name = $request->full_name ? $request->full_name : '';
			$users->country = $request->country ? $request->country : '';
			$users->state = $request->state ? $request->state : '';
			$users->city = $request->city ? $request->city : '';
			$users->address = $request->address ? $request->address : '';
			$users->dob = $request->dob ? $request->dob : '';
			$users->phone = $request->phone ? $request->phone : '';
			$users->email = $request->email ? $request->email : '';
			if ($request->user_image != '') {
				$path = public_path() . '/uploads/users/';
				//code for remove old file
				if ($users->user_image != '' && $users->user_image != null) {
				$file_old = $path . $users->user_image;
				if (file_exists($file_old)) {
				unlink($file_old);
				}}
				
			if(!empty($request->user_image)){
				$fileName = time().'_user_image.'.$request->user_image->getClientOriginalExtension();
				$request->user_image->move(public_path('/uploads/users'), $fileName);
				$users->user_image = $fileName;
			}}
			
			// dd($users);
			$users->save();
			return redirect()->route('userProfile')->with('success','CustomerProfile Has Been updated successfully');
		}
       
    }
        
    

