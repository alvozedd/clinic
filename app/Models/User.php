<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

<<<<<<< HEAD
    
    // app/Models/User.php
protected $fillable = [
    'email',    // Now using email as primary identifier
    'password',
    'role',
    'first_name',
    'last_name',
    'phone',
    'address',
    'date_of_birth',
    'is_active'
];

// Remove any username references from methods

=======
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'role' // Add 'role' here
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isDoctor()
    {
        return $this->role === 'doctor';
    }

    public function isSecretary()
    {
        return $this->role === 'secretary';
    }

    public function isPatient()
    {
        return $this->role === 'patient';
    }
    public function getFullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
    
}
=======
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define the many-to-many relationship with Role model.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
