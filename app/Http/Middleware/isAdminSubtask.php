<?php

namespace App\Http\Middleware;

use App\Task;
use App\Subtask;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class isAdminSubtask
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
        $task_id = Subtask::find($request->id)->task_id;
        $task=Task::find($task_id);
        $role=$task->users->find($user->id)->pivot->role;
        if($role!='admin'){
            return Redirect::back()->withErrors([' You have to be an Admin to do that']);
        }
        return $next($request);
    }
}
