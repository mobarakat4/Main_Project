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
        // return $request->expectsJson() ? null : route('show_login_page');
        if($request->expectsJson()){
            return null;
        }else{
            if($request->is('admin')||$request->is('admin/*')){
                return redirect('admin/login');
            }
            return route('show_login_page');
        }
    }
}
