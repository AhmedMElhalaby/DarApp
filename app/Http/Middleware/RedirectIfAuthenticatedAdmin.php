<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard('admin')->user()) {
            Auth::guard('admin')->logout();
            return redirect('admin\login');
        }else{
            if(Auth::guard('admin')->user()->isIsActive() != true){
                Auth::guard('admin')->logout();
                return redirect('admin\login')->with('error',__('admin.messages.your_account_is_in_active'));
            }
        }

        return $next($request);
    }
}
