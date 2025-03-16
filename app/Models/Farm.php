<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'location', 'size'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sensors() {
        return $this->hasMany(Sensors::class);
    }

    public function crops() {
        return $this->hasMany(Crops::class);
    }
}
