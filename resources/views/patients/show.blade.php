@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patient Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $patient->first_name }} {{ $patient->last_name }}</h5>
            <p class="card-text"><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>
            <p class="card-text"><strong>Gender:</strong> {{ $patient->gender }}</p>
            <p class="card-text"><strong>Contact Number:</strong> {{ $patient->contact_number }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $patient->email }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $patient->address }}</p>
            <p class="card-text"><strong>Medical History:</strong> {{ $patient->medical_history }}</p>
            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection