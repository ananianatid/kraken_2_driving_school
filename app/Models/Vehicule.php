<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $guarded = [];
    
    public function license() {
        return $this->belongsTo(License::class);
    }
}
