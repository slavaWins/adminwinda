<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateAdmin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->user()) return route('/');
    }

    public function authenticate($request, array $guards)
    {
        if (!$request->user()) abort(404);
        if (!$request->user()->is_admin) abort(404);

    }
}
