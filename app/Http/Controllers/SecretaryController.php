<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;

class SecretaryController extends Controller
{
    public function dashboard()
    {
        return view('secretary.dashboard', [
            'todayAppointmentsCount' => Appointment::whereDate('appointment_date', Carbon::today())
                ->count(),
                
            'pendingAppointmentsCount' => Appointment::where('status', 'pending')
                ->count(),
                
            'patientsCount' => Patient::count(),
                
            'recentAppointments' => Appointment::with(['patient.user', 'doctor.user'])
                ->orderBy('appointment_date', 'desc')
                ->orderBy('start_time', 'desc')
                ->take(5)
                ->get()
        ]);
    }
}