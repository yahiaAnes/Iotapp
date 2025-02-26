<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SensorReadings extends Model
{
    use HasFactory;

    protected $fillable = ['sensor_id', 'value', 'unit', 'timestamp'];

    public function sensor() {
        return $this->belongsTo(Sensor::class);
    }
}
