<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return string
     */
    protected function redirectTo($request)
    {
        if (config('access.login')) {
            return route('frontend.auth.login');
        } else {
            return route('frontend.auth.admin.login');
        }
    }
}
