<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class IrrigationSystem extends Model
{
    use HasFactory;

    protected $fillable = ['farm_id', 'mode', 'status', 'last_run'];

    public function farm() {
        return $this->belongsTo(Farm::class);
    }
}
