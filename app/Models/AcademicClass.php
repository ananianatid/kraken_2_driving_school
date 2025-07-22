<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    protected $guarded;
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function licence()
    {
        return $this->belongsTo(License::class);
    }
}
