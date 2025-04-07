@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Appointments</h1>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Add New Appointment</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Staff</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                <td>{{ $appointment->staff->name }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->status }}</td>
                <td>
                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection