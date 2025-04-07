<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $patient = auth()->user()->patient;
        $records = MedicalRecord::where('patient_id', $patient->id)
                    ->with('doctor.user')
                    ->latest()
                    ->paginate(10);

        return view('medical-records.index', compact('records'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('medical-records.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $validated['doctor_id'] = auth()->user()->staff->id;

        MedicalRecord::create($validated);

        return redirect()->route('medical-records.index')
            ->with('success', 'Medical record created successfully');
    }

    // Add show(), edit(), update(), destroy() methods as needed
}