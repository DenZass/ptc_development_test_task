<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoleChecking
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
        if($request->header('X-User-Role') !== null && in_array($request->header('X-User-Role'), ['admin', 'user'])){

            if($request->header('X-User-Role') === 'user'){
                $nowHourInt = intval(Carbon::now()->format('H'));

                if($nowHourInt >= 9 && $nowHourInt < 18){
                    return $next($request);

                } else {
                    return redirect()->route('forbidden');
                }
            }
            return $next($request);

        } else {
            return redirect()->route('forbidden');
        }
    }
}
