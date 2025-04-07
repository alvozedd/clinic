<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

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