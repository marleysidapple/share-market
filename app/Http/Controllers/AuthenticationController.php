<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;
use Redirect;
use App\Permission;

class AuthenticationController extends Controller
{


   public function __construct()
   {
     $this->middleware('guest', ['except' => 'logout']);
   }

    /*
    * login view
    * render login.blade.php
    */
    public function login()
    {
      return view('modules.auth.login');
    }


    public function validateLogin(LoginRequest $request)
    {
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
            $userRole = Auth::user()->roles->first()->name;
            switch ($userRole) {
              case 'superadmin':
                return redirect()->intended('home');
                break;   
              case 'admin':
                dd('this is admin');
                break;
              case 'user';
                dd('this is user');
                break;
              default:
                dd('unknown user');
                break;
            }
         
        } else {
          return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }


    public function logout()
    {
      Auth::logout();
      return redirect()->to('login');
    }

}
