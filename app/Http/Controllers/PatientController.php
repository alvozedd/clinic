<?php

namespace App\Http\Controllers;

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
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
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
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
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
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
