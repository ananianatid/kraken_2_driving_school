<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class, 'class_id');
    }
}
