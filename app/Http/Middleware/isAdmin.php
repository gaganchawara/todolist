<?php

namespace App\Http\Middleware;

use Closure;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class isAdmin
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

        $task=Task::find($request->id);
        $role=$task->users->find($user->id)->pivot->role;
        if($role!='admin'){
            return Redirect::back()->withErrors([' You have to be an Admin to do that']);
        }
        return $next($request);
    }
}
