@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Appointment</h1>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="staff_id">Staff</label>
            <select name="staff_id" class="form-control" required>
                @foreach ($staff as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_date">Appointment Date</label>
            <input type="datetime-local" name="appointment_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Scheduled">Scheduled</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection