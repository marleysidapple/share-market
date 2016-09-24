<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\User;
use Auth;
use App\Role;
use Entrust;

class UserController extends Controller
{

    public function index()
    {
    	$users = User::where('id', '!=', Auth::user()->id)->get();
    	return view('modules.user.list', compact('users'));
    }


    /*
    * adding new user
    * render view
    *
    */
    public function add()
    {
    	$roles = Role::all();
    	return view('modules.user.add', compact('roles'));
    }

    /*
    * saving new user
    * post datas
    *
    */
    public function store(UserRequest $request)
    {
    	try {
    		$user = User::create([
  					'name'	=> $request->name,
  					'email'	=> $request->email,
  					'password' => \bcrypt($request->password)
    				]);
    		 //attach role for a user
    		 $user->attachRole($request->role);
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', 'Something went wrong. Please try later');
    	}
    	return redirect()->back()->with('success', 'User added successfully');
    }


    /*
    * editing user
    * render view
    */
    public function edit($id)
    {
    	$user = User::find($id);
    	$roles = Role::all();
    	return view('modules.user.edit', compact('user', 'roles'));
    }


    /*
    * updating user
    * post route
    */
    public function update(UpdateUserRequest $request, $id)
    {
    	try {
    		$user 			= User::find($id);
    		$user->name 	= $request->name;
    		$user->email	= $request->email;
    		$user->password = \bcrypt($request->password);
    		//updating user role
    		$user->roles()->sync((array)$request->role);
    		} catch (Exception $e) {
    			return redirect()->back()->with('error', 'Something went wrong. Please try later');
    		}	
    		return redirect()->back()->with('success', 'User updated successfully');
    }

}
