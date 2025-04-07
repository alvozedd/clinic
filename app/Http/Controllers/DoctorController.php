<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $doctor = auth()->user()->staff;

        return view('doctor.dashboard', [
            'todayAppointments' => Appointment::with(['patient.user'])
                ->where('doctor_id', $doctor->id)
                ->where('appointment_date', Carbon::today())
                ->where('status', 'scheduled')
                ->orderBy('start_time')
                ->get(),
                
            'upcomingAppointments' => Appointment::with(['patient.user'])
                ->where('doctor_id', $doctor->id)
                ->where('appointment_date', '>', Carbon::today())
                ->where('status', 'scheduled')
                ->orderBy('appointment_date')
                ->orderBy('start_time')
                ->take(5) // Limit to 5 upcoming appointments
                ->get()
        ]);
    }
}
