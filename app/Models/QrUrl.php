<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QrUrl extends Model
{
    use HasFactory;

    protected $table = 'qr_urls';
    protected $fillable = ['qrUrl'];

    

    public static function boot()
    {
        parent::boot();

        static::creating(function () {
            return false; 
        });
    }
}
