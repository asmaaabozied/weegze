<?php
//
//namespace App\Http\Middleware;
//
//use App\Providers\RouteServiceProvider;
//use Closure;
//use Illuminate\Support\Facades\Auth;
//
//class RedirectIfAuthenticated
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
//     * @param  string|null  $guard
//     * @return mixed
//     */
////    public function handle($request, Closure $next, $guard = null)
////    {
////        if (Auth::guard($guard)->check()) {
////            return redirect(RouteServiceProvider::HOME);
////        }
////
////        return $next($request);
////    }
//
//    public function handle($request, Closure $next, $guard = null)
//    {
////        switch ($guard) {
////            case 'admin':
////                if (Auth::guard($guard)->check()) {
////                    return redirect()->route('admin.dashboard');
////                }
////                break;
////
////            default:
////                if (Auth::guard($guard)->check()) {
////                    return redirect()->route('user.login');
////                }
////                break;
////        }
//
//
//        if (Auth::guard($guard)->check()) {
//            return redirect(route('admin.dashboard'));
//        }
//
////        return $next($request);
//
//        return $next($request);
//    }
//
//}


namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */

    public function handle(Request $request, Closure $next, $guard = null)
    {
//        if (Auth::guard('admin')->check()) {
//            return redirect(route('admin.dashboard'));
//        }
//        return $next($request);


        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('user-dashboard');
                }
                break;
        }

        return $next($request);

    }
}
