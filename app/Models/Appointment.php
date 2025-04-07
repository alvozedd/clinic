<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'patient_id',
        'doctor_id',
        'secretary_id',
        'appointment_date',
        'start_time',
        'end_time',
        'status',
        'reason',
        'notes'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

=======
        'patient_id', 'staff_id', 'appointment_date', 'status', 'notes'
    ];

    // Relationship with Patient
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

<<<<<<< HEAD
    public function doctor()
    {
        return $this->belongsTo(Staff::class, 'doctor_id');
    }

    public function secretary()
    {
        return $this->belongsTo(Staff::class, 'secretary_id');
    }
}
=======
    // Relationship with Staff (User)
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
