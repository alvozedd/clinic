<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialization',
        'hire_date',
        'license_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function secretaryAppointments()
    {
        return $this->hasMany(Appointment::class, 'secretary_id');
    }
}