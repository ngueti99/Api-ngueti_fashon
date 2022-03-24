<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class ApiAdminMiddleware
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
        // if(Auth::check()){
        //     $user = User::find(auth()->user());
        //     if($user->tokenCan('server:admin')){
        //         return $next($request);
        //     }
        //     else{
        //         response()->json([
        //             'message'=>'access Denied.! you are not a admin'
        //         ],403);
        //     }
        // }
        $roles = Auth::user()->roles;

        foreach ($roles as $role) {
            if ($role->name =='admin') {
                return $next($request);
            }
        }
        return
        response()->json([
            'message'=>'access Denied.! you are not a admin'
        ],403);
        // return redirect('/');
        // return $next($request);
    }
}
