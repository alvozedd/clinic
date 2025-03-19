<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
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