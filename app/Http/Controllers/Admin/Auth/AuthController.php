<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        $attributes = $request->validated();
//        dd($attributes);
        if(auth()->guard('admin')->attempt($attributes))
        {
            return redirect()->route('admin.dashboard')->with('success',"Welcome");
        }
        return redirect()->route('admin.login-form')->with('error',"Not Valid Data");
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login-form');
    }
}
