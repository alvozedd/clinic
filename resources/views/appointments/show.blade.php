@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Appointment Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Appointment #{{ $appointment->id }}</h5>
            <p class="card-text"><strong>Patient:</strong> {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</p>
            <p class="card-text"><strong>Staff:</strong> {{ $appointment->staff->name }}</p>
            <p class="card-text"><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $appointment->status }}</p>
            <p class="card-text"><strong>Notes:</strong> {{ $appointment->notes }}</p>
            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection