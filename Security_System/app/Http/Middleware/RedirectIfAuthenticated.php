<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch($guard){
            case 'admin': // If you are logged in as admin
                if(Auth::guard($guard)->check()){ // And you are trying to access page only for admins
                    return redirect()->route('admin.dashboard'); //Redirects to that page
                }
                break;

            default:
                if (Auth::guard($guard)->check()) { // If normal user is logged in then redirect home
                    return redirect('/home');
                }
                break;
        }

        return $next($request);
    }
}
