<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PatientController extends Controller
{
    // ======================
    // ADMIN-SIDE OPERATIONS
    // ======================

    public function index()
    {
        return view('admin.patients.index', [
            'patients' => Patient::with('user')->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'blood_type' => 'nullable|string|max:5',
            'allergies' => 'nullable|string',
            'insurance_info' => 'nullable|string'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'is_active' => true
        ]);

        Patient::create([
            'user_id' => $user->id,
            'blood_type' => $request->blood_type,
            'allergies' => $request->allergies,
            'insurance_info' => $request->insurance_info
        ]);

        return redirect()->route('admin.patients.index')
            ->with('success', 'Patient created successfully!');
    }

    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', [
            'patient' => $patient
        ]);
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $patient->user_id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'blood_type' => 'nullable|string|max:5',
            'allergies' => 'nullable|string',
            'insurance_info' => 'nullable|string'
        ]);

        $patient->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        $patient->update([
            'blood_type' => $request->blood_type,
            'allergies' => $request->allergies,
            'insurance_info' => $request->insurance_info
        ]);

        return redirect()->route('admin.patients.index')
            ->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        $patient->user()->delete(); // Delete user first (will cascade or handle patient delete)
        $patient->delete();

        return redirect()->route('admin.patients.index')
            ->with('success', 'Patient deleted successfully!');
    }

    // ===========================
    // PATIENT DASHBOARD FUNCTION
    // ===========================

    public function dashboard()
    {
        $patient = Auth::user()->patient;

        return view('patient.dashboard', [
            'appointments' => Appointment::with(['doctor.user'])
                ->where('patient_id', $patient->id)
                ->where('status', 'scheduled')
                ->where('appointment_date', '>=', now())
                ->orderBy('appointment_date')
                ->take(5)
                ->get(),

            'medicalRecords' => MedicalRecord::where('patient_id', $patient->id)
                ->orderBy('visit_date', 'desc')
                ->take(5)
                ->get()
        ]);
    }
}
