<?php

namespace App\Http\Controllers\Front\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function postRegistration(Request $request){
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6'
        ]);
        $data = $request->all();
        $check = User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
        
        // $check = $this->create($data);
         return redirect(url("/"))->withSuccess('Great! You have Successfully loggedin');
    }
        
}
