<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crops extends Model
{
    use HasFactory;

    protected $fillable = ['farm_id', 'name', 'planting_date', 'harvest_date', 'fertilizers_used', 'status'];

    // protected $fillable = ['farm_id', 'name', 'planting_date', 'harvest_date', 'fertilizers_used'];

    public function farm() {
        return $this->belongsTo(Farm::class);
    }
}
