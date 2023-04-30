<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required | min:3 |unique:permissions']);

        Permission::create($validated);

        return to_route('admin.permissions.index')->with('message', 'Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', ['permission' => $permission, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required | min:3 |unique:permissions']);

        $permission->update($validated);

        return back()->with('message', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with('message', 'Permission deleted successfully');
    }

    public function assignRole(Request $request ,Permission $permission)
    {
        if($permission->hasRole($request->role)){
            return back()->with('message', 'Role exists!');
        }
        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned successfully!');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('message', 'Role removed successfully!');
        }
        return back()->with('message', 'Role does not exist!');
    }
}