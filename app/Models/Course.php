<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
    public function class()
    {
        return $this->belongsTo(\App\Models\AcademicClass::class, 'class_id');
    }
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id');
    }
    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }
    public function vehicule()
    {
        return $this->belongsTo(\App\Models\Vehicule::class, 'vehicule_id');
    }
}
