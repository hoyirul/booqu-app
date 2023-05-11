<?php

namespace App\Http\Middleware;

use App\Models\Membership;
use App\Models\UserSession;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaxDeviceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $maxDevice = Auth::user()->membership->max_device;
        $countDevice = UserSession::where('user_id', Auth::user()->id)->count('user_id');
        if(Auth::check()){
            if($countDevice <= $maxDevice){
                return $next($request);
            }
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('danger', 'Your account just can be login with max '.$maxDevice.' devices!');
    }
}
