<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'country',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $attributes = [
        'role' => 'user',
    ];
    
    public static array $roles = ['admin', 'user'];
    
    public function setRoleAttribute($value)
    {
        if (!in_array($value, self::$roles)) {
            throw new \InvalidArgumentException("Invalid role: $value");
        }
        $this->attributes['role'] = $value;
    }
    
    public function farms() {
        return $this->hasMany(Farm::class);
    }

    public function crops()
    {
        return $this->hasMany(Crops::class, 'user_id'); 
    }
}
