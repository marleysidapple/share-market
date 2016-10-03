<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class dashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('able', ['except' => 'index', 'attachPermission']);
    }

    public function index()
    {
        return view('modules.dashboard.main');
    }

    public function permissions()
    {

        $perms = Permission::all();

        if (!empty($perms)) {
            foreach ($perms as $key => $val) {
                $existingPermissions[] = $val->name;
            }
        }

        $routeCollection = \Route::getRoutes();
        if (!empty($perms)) {
            foreach ($routeCollection as $value) {
                $totalRoutes[] = $value->getName();
            }
        }

        $key = array_search('dashboard', $totalRoutes);
        if (false !== $key) {
            unset($totalRoutes[$key]);
        }

        $newRoutesToAdd = array_diff($totalRoutes, $existingPermissions);

        if (!empty($newRoutesToAdd)) {
            foreach ($newRoutesToAdd as $key => $value) {
                if ($value != "") {
                    Permission::create([
                        'name'         => $value,
                        'display_name' => $value,
                        'description'  => '',

                    ]);
                }
            }
        }
    }

    /*
     * assigning permission
     * rendering view
     */
    public function assignPermission()
    {
        $roles      = Role::where('name', '!=', 'superadmin')->get();
        $permission = Permission::all();
        return view('modules.permission.assign', compact('roles', 'permission'));
    }

    /*
     * attaching permission
     * saving into database
     */
    public function attachPermission(Request $request)
    {
        $perm    = Permission::find($request->permission);
        $hasPerm = $perm->perms()->where(['permission_id' => $request->permission, 'role_id' => $request->role])->exists();
        if (!$hasPerm) {
            $perm->perms()->attach($request->role);
        } else {
            $perm->find($request->permission)->perms()->detach();
        }
    }
}
