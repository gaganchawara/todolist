<?php

namespace App\Http\Middleware;

use App\Task;
use App\Subtask;
use Closure;
use Illuminate\Support\Facades\Auth;

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
            return redirect(route('User.tasks'));
        }
        return $next($request);
    }
}
