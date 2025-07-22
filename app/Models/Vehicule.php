<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $guarded = [];
    public function licence()
    {
        return $this->belongsTo(License::class);
    }
}
