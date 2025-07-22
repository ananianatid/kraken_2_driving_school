<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $guarded = [];
    public function academicClass()
    {
        return $this->belongsTo(\App\Models\AcademicClass::class, 'academic_class_id');
    }
}
