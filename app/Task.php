<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'name',
        'status',
        'user_id',
        'role',
        'time'
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
//    public function usersone(){
//        return $this->belongsTo('App\User');
//    }
    public function subtasks(){
        return $this->hasMany('App\Subtask');
    }
}
