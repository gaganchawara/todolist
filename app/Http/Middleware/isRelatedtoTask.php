<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;
use Closure;

class isRelatedtoTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $exists = $user->tasks->contains($request->id);
        if(!$exists){
            return redirect(route('home'))->withErrors([' You are not authorised to do that. Ask admin for the rights.']);
        }
        return $next($request);
    }
}
