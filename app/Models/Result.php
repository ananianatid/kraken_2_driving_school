<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = [];
    public function exam()
    {
        return $this->belongsTo(\App\Models\Exams::class, 'exam_id');
    }
    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id');
    }
}
