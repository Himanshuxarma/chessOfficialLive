<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
		$data['roles'] = Role::orderBy('id', 'ASC')->paginate(20);
		return view('admin.roles.index', $data);
	}
		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/

    public function create(){
		return view('admin.roles.create');
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
		'role_type' => 'required'
		]);
		$roles = new Role;
		$roles->title = $request->title;
        $roles->role_type = $request->role_type;
		$roles->status = $request->status ? $request->status : 0;
		$roles->save();
		return redirect()->route('rolesList')->with('success', 'Role has been created successfully.');
	}

		/**
		* Display the specified resource.
		*
		* @param  \App\Role  $Role
		* @return \Illuminate\Http\Response
		*/


    public function edit($id){
		$roles = Role::find($id);
		return view('admin.roles.edit', compact('roles'));
	}

		/**
		* Update the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  \App\Role  $Role
		* @return \Illuminate\Http\Response
		*/

    public function update($id, Request $request){
		$request->validate([
			'title' => 'required',
			'role_type' => 'required'
			]);
			$roles = Role::find($id);
			$roles->title = $request->title;
			$roles->role_type = $request->role_type;
			$roles->status = $request->status ? $request->status : 0;
			$roles->save();
		return redirect()->route('rolesList')->with('success', 'Role Has Been updated successfully');
	}

		/**
		* Remove the specified resource from storage.
		*
		* @param  \App\Role  $roles
		* @return \Illuminate\Http\Response
		*/

    public function roles($id){
		$roles = Role::find($id);
		$roles->delete();
		return redirect()->route('rolesList')->with('success', 'Role has been deleted successfully');
	}

    public function roles_status($id){
		$roles = Role::find($id);
		if ($roles->status == 1) {
		$roles->status = 0;
		} else {
		$roles->status = 1;
		}
		$roles->save();
		return redirect()->route('rolesList')->with('success', 'Role has been Status successfully');
	}
}
