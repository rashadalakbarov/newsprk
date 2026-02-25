<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:2',
            'password' => 'required'
        ]);

        if($validator->passes()){
            if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])){
                if(Auth::guard('admin')->user()->status != 'a20'){
                    Auth::guard('admin')->logout();
                    return redirect()->route('index')->with('error', 'You are not authorized to access this page');
                }

                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.index')->with('error', 'Either username or password is incorrect');
            }
        } else {
            return redirect()->route('admin.index')->withInput()->withErrors($validator);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->route('admin.index');
    }
}
