<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
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
=======
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure authentication
    }

    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    }

    public function create()
    {
<<<<<<< HEAD
        return view('admin.patients.create');
=======
        return view('patients.create');
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
<<<<<<< HEAD
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
=======
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'contact_number' => 'required|string|max:15',
            'email' => 'nullable|email|unique:patients,email',
            'address' => 'nullable|string',
            'medical_history' => 'nullable|string',
        ]);

        Patient::create($request->only([
            'first_name', 'last_name', 'date_of_birth', 'gender',
            'contact_number', 'email', 'address', 'medical_history'
        ]));

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    }

    public function edit(Patient $patient)
    {
<<<<<<< HEAD
        return view('admin.patients.edit', [
            'patient' => $patient
        ]);
=======
        return view('patients.edit', compact('patient'));
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
<<<<<<< HEAD
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
=======
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'contact_number' => 'required|string|max:15',
            'email' => 'nullable|email|unique:patients,email,' . $patient->id,
            'address' => 'nullable|string',
            'medical_history' => 'nullable|string',
        ]);

        $patient->update($request->only([
            'first_name', 'last_name', 'date_of_birth', 'gender',
            'contact_number', 'email', 'address', 'medical_history'
        ]));

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    }

    public function destroy(Patient $patient)
    {
<<<<<<< HEAD
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
=======
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    }
}
