<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Username;
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

        if (!empty($existingPermissions)) {
            $newRoutesToAdd = array_diff($totalRoutes, $existingPermissions);
        } else {
            $newRoutesToAdd = $totalRoutes;
        }

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
    public function assignPermission($id = null)
    {
        if (!is_null($id)) {
            $roles = Role::where('name', '!=', 'superadmin')
                ->where('id', $id)
                ->get();
        } else {
            $roles = Role::where('name', '!=', 'superadmin')->get();
        }
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

    /*
     * Rendering username setting view
     *
     */
    public function usernameDefiner()
    {
        $user = Username::first();
        return view('modules.username.show', compact('user'));
    }

    /*
     * storing username
     * post
     */
    public function storeUsername(Request $request, $id = null)
    {
        if (!is_null($id)) {
            $username         = Username::find($id);
            $username->prefix = $request->prefix;
            $username->year   = date('Y');
            $username->save();
        } else {
            $username = Username::create([
                'prefix' => $request->prefix,
                'year'   => date('Y'),
            ]);
        }

        return redirect()->back()->with('success', 'Username setting added/updated successfully');
    }
}
