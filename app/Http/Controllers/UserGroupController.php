<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserGroupRequest;
use App\Http\Requests\UserGroupRequest;
use App\Role;

class UserGroupController extends Controller
{

    /*
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

    /*
     *
     * storing usergroup
     * POST datas
     */
    public function store(UserGroupRequest $request)
    {
        try {
            Role::create([
                'name'         => $request->name,
                'display_name' => $request->display_name,
                'description'  => trim($request->description),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try later');
        }
        return redirect()->back()->with('success', 'New User Group Created Successfully');
    }

    /*
     * editing usergroup
     * rendering view
     *
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('modules.usergroup.edit', compact('role'));
    }

    /*
     * updating user group
     * save datas
     *
     */
    public function update(UpdateUserGroupRequest $request, $id)
    {
        try {
            $role               = Role::find($id);
            $role->name         = $request->name;
            $role->display_name = $request->display_name;
            $role->description  = trim($request->description);
            $role->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try later');
        }
        return redirect()->back()->with('success', 'User Group Updated Successfully');
    }

}
