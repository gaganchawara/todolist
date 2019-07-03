<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    protected $fillable=[
        'name',
        'status',
        'user_id',
        'task_id',
        'deadline'
    ];
    public function task(){
        return $this->belongsTo('App\Task');
    }
}
