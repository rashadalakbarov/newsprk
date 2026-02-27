<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::all();

        return view('admin.roles', compact('roles'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'role_name' => 'required|regex:/^[A-Za-z\s]+$/|min:3',
        ]);

        if($validator->passes()){
            Role::create([
                'name' => $request->role_name
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
}
