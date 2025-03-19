<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'staff_id', 'appointment_date', 'status', 'notes'
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relationship with Staff (User)
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}