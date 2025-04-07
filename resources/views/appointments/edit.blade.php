@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Appointment</h1>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->first_name }} {{ $patient->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="staff_id">Staff</label>
            <select name="staff_id" class="form-control" required>
                @foreach ($staff as $user)
                <option value="{{ $user->id }}" {{ $appointment->staff_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_date">Appointment Date</label>
            <input type="datetime-local" name="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Scheduled" {{ $appointment->status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="Completed" {{ $appointment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $appointment->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea name="notes" class="form-control">{{ $appointment->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection