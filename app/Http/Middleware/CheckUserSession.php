<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user session exists
        if (!session('user')) {

             // Redirect to the login route with an error message if not logged in
            return redirect()->route('login')->withErrors(['username' => 'Please log in to access this page.']);
        }
        return $next($request); // Proceed to the next middleware or request handler
    }
}