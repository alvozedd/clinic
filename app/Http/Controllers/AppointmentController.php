<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
<<<<<<< HEAD
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // ========================
    // ADMIN-SIDE APPOINTMENTS
    // ========================

    public function index()
    {
        return view('admin.appointments.index', [
            'appointments' => Appointment::with(['patient.user', 'doctor.user', 'secretary.user'])
                ->latest()
                ->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.appointments.create', [
            'patients' => Patient::with('user')->get(),
            'doctors' => Staff::whereHas('user', function ($q) {
                $q->where('role', 'doctor');
            })->with('user')->get(),
            'secretaries' => Staff::whereHas('user', function ($q) {
                $q->where('role', 'secretary');
            })->with('user')->get()
        ]);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:staff,id',
            'secretary_id' => 'nullable|exists:staff,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:500',
            'status' => 'required|in:scheduled,completed,cancelled'
        ]);

        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'secretary_id' => $request->secretary_id,
            'appointment_date' => $request->appointment_date,
            'start_time' => $request->start_time,
            'end_time' => Carbon::parse($request->start_time)->addMinutes(30),
            'reason' => $request->reason,
            'status' => $request->status
        ]);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment created successfully!');
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', [
            'appointment' => $appointment,
            'patients' => Patient::with('user')->get(),
            'doctors' => Staff::whereHas('user', function ($q) {
                $q->where('role', 'doctor');
            })->with('user')->get(),
            'secretaries' => Staff::whereHas('user', function ($q) {
                $q->where('role', 'secretary');
            })->with('user')->get(),
            'statuses' => ['scheduled', 'completed', 'cancelled']
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:staff,id',
            'secretary_id' => 'nullable|exists:staff,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:500',
            'status' => 'required|in:scheduled,completed,cancelled'
        ]);

        $appointment->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'secretary_id' => $request->secretary_id,
            'appointment_date' => $request->appointment_date,
            'start_time' => $request->start_time,
            'end_time' => Carbon::parse($request->start_time)->addMinutes(30),
            'reason' => $request->reason,
            'status' => $request->status
        ]);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment updated successfully!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment deleted successfully!');
    }

    // ==========================
    // PATIENT-SIDE APPOINTMENTS
    // ==========================

    public function createForPatient()
    {
        $doctors = Staff::with('user')->whereHas('user', function ($query) {
            $query->where('role', 'doctor');
        })->get();

        return view('appointments.create', compact('doctors'));
    }

    public function storeForPatient(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:500'
        ]);

        Appointment::create([
            'patient_id' => Auth::user()->patient->id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'start_time' => $request->start_time,
            'end_time' => Carbon::parse($request->start_time)->addMinutes(30),
            'status' => 'scheduled',
            'reason' => $request->reason
        ]);

        return redirect()->route('patient.dashboard')
            ->with('success', 'Appointment booked successfully!');
    }
}
=======
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the appointments.
     */
    public function index()
    {
        $appointments = Appointment::with(['patient', 'staff'])->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $patients = Patient::all();
        $staff = User::where('role', 'staff')->get(); // Assuming staff have a 'role' column
        return view('appointments.create', compact('patients', 'staff'));
    }

    /**
     * Store a newly created appointment in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'staff_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Create the appointment
        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified appointment.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $staff = User::where('role', 'staff')->get();
        return view('appointments.edit', compact('appointment', 'patients', 'staff'));
    }

    /**
     * Update the specified appointment in the database.
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Validate the request
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'staff_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Update the appointment
        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified appointment from the database.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
