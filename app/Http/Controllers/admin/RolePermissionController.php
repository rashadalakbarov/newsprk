<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Permission;

class RolePermissionController extends Controller
{
    public function index(){
        $roles = Role::all();
        $role_permissions = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('admin.role-permission', compact('permissions', 'roles', 'role_permissions'));
    }

    public function store(Request $request){
        $request->validate([
            'role_select' => 'required|exists:roles,id',
            'permission_checkbox' => 'required|array|min:1',
            'permission_checkbox.*' => 'exists:permissions,id'
        ], [
            'role_select.required' => 'Role field is required.',
            'permission_checkbox.required' => 'At least one permission must be selected.',
            'permission_checkbox.min' => 'At least one permission must be selected.'
        ]);

        $role = Role::findOrFail($request->role_select);
        $role->permissions()->sync($request->permission_checkbox);

        return response()->json([
            'success' => true,
            'message' => 'Role permissions saved successfully'
        ]);
    }

    public function getPermission($id){
        $roles = Role::findOrFail($id);

        return response()->json([
            'permissions' => $roles->permissions->pluck('id')
        ]);
    }

    public function update(Request $request, $id) {
        $role = Role::findOrFail($id);

        $permissions = $request->permission_checkbox ?? [];

        $role->permissions()->sync($permissions);

        return response()->json([
            'status' => 'success',
            'message' => 'Role permissions updated successfully'
        ]);
    }

    public function delete($id){
        $role = Role::findOrFail($id);

        // bütün permissionları kaldır
        $role->permissions()->detach();

        return response()->json([
            'status' => 'success',
            'message' => 'Role permissions deleted successfully'
        ]);
    }
}
