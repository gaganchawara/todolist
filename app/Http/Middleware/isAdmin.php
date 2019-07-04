<?php

namespace App\Http\Middleware;

use Closure;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;


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
            return redirect(route('User.tasks'));
        }
        return $next($request);
    }
}
