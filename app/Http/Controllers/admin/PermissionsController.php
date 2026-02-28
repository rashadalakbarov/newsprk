<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PermissionsController extends Controller
{
    public function index(){
        $permissions = Permission::all();

        return view('admin.permissions', compact('permissions'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'permission_name' => 'required|regex:/^[A-Za-z\s]+$/|min:3',
        ]);

        if($validator->passes()){
            Permission::create([
                'label' => $request->permission_name,
                'key' => strtolower(Str::slug($request->permission_name, '.'))
            ]);

            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
    }

    public function update(Request $request, string $id){
        $validator = Validator::make($request->all(), [
            'edit_permission_name' => 'required|regex:/^[A-Za-z\s]+$/|min:3',
        ]);

        if($validator->passes()){
            $permission= Permission::findOrFail($id);
            $permission->label = $request->edit_permission_name;
            $permission->key = strtolower(Str::slug($request->edit_permission_name, '.'));            
            $permission->save();

            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
    }

    public function delete(string $id){

        $roles= Permission::findOrFail($id);
        $roles->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
