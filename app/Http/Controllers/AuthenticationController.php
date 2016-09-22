<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;
use Redirect;

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
            return redirect()->intended('home');
        } else {
          return redirect()->back();
        }
    }


    public function logout()
    {
      Auth::logout();
      return redirect()->to('login');
    }


}