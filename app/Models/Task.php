<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Return all that are finished
     */
    public function isCompleted() {
        return $this->completed_at !== null;
    }

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}