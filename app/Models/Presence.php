<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $fillable = ['course_id', 'student_id', 'status', 'justification', 'justification_url'];
    // Relation vers le cours
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    // Relation vers l'élève
    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }
}
