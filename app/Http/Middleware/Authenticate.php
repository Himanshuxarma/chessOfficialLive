<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson() && Route::current()->getPrefix()=='/admin') {
            return route('adminLogin');
        } else {
            return route('frontsLogin');
        }
    }
}
