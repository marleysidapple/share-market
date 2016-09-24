<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Permission;

class dashboardController extends Controller
{

    public function index()
    {
      return view('modules.dashboard.main');
    }

    public function permissions()
    {
       $routeCollection = \Route::getRoutes();
       foreach ($routeCollection as $value) {
	        $totalRoutes[] = $value->getName();
     	}

     	$key = array_search('dashboard', $totalRoutes);
     	if (false !== $key) {
		    unset($totalRoutes[$key]);
		}

     	foreach($totalRoutes as $key => $value){
     		 if ($value != ""){
     		 	Permission::create([
     		 			'name' 		   => $value,
     		 			'display_name' => $value,
     		 			'description'  => ''

     		 		]);
     		 }
     	}
    }


    /*
    * assigning permission 
    * rendering view
    */
    public function assignPermission()
    {
        $roles = Role::all();
        $permission = Permission::all();
        return view('modules.permission.assign', compact('roles', 'permission'));
    }


    /*
    * attaching permission
    * saving into database
    */
    public function attachPermission(Request $request)
    {
        $perm = Permission::find($request->permission);
        $hasPerm = $perm->perms()->where(['permission_id' => $request->permission, 'role_id' => $request->role])->exists();
        if (!$hasPerm){
            $perm->perms()->attach($request->role);
        } else {
            $perm->find($request->permission)->perms()->detach();
        }
    }
}
