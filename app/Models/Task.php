<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'task_id',
        'project_id',
        'description',
        'status',
    ];

    public function subtasks()
    {
        return $this->hasMany(Task::class, 'task_id');
    }

    public function parentTask()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
