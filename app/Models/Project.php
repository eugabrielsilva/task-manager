<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'delivery_date'
    ];

    protected $casts = [
        'delivery_date' => 'date'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
