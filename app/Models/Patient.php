<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $fillable = [
        'user_id',
        'blood_type',
        'allergies',
        'medical_notes',
        'insurance_info'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
    
}
=======
    
    protected $fillable = [
        'first_name', 'last_name', 'date_of_birth', 'gender',
        'contact_number', 'email', 'address', 'medical_history'
    ];
}
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
