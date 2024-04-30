<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
//        dd($request);
        if (\Auth::guard('web')->check()){
            return 'user';
        }elseif (\Auth::guard('admin')->check()){
            return route('admin.login-form');
        }
        return route('admin.login-form');
    }
}
