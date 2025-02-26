<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensors extends Model
{
    use HasFactory;

    protected $fillable = ['farm_id', 'type', 'status', 'location'];

    public function farm() {
        return $this->belongsTo(Farm::class);
    }

    public function readings() {
        return $this->hasMany(SensorReading::class);
    }
}
