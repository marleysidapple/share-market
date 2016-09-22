<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserGroupRequest;
use App\User;
use App\Role;

class UserGroupController extends Controller
{

  /*
  *
  * list of user groups
  *
  */
  public function index()
  {
    $roles = Role::all();
    return view('modules.usergroup.list', compact('roles'));
  }

  /*
  *
  * adding new user group
  * render view
  */
  public function show()
  {
    return view('modules.usergroup.add');
  }

}
