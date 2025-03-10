<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable = ['course_id', 'title', 'content', 'step_number'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
