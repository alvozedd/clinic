<<<<<<< HEAD
<!-- resources/views/appointments/create.blade.php -->
@extends('layouts.base')

@section('title', 'Book Appointment')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Book New Appointment</h1>
        
        <form method="POST" action="{{ route('appointments.storeForPatient') }}">
            @csrf

            <div class="mb-4">
                <label for="doctor_id" class="block text-gray-700 mb-2">Doctor</label>
                <select id="doctor_id" name="doctor_id" required
                    class="w-full px-3 py-2 border rounded-lg">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">
                            Dr. {{ $doctor->user->last_name }} ({{ $doctor->specialization }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="appointment_date" class="block text-gray-700 mb-2">Date</label>
                <input type="date" id="appointment_date" name="appointment_date" 
                    min="{{ date('Y-m-d') }}" required
                    class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label for="start_time" class="block text-gray-700 mb-2">Time</label>
                <input type="time" id="start_time" name="start_time" required
                    min="09:00" max="17:00" step="1800"
                    class="w-full px-3 py-2 border rounded-lg">
                <p class="text-sm text-gray-500 mt-1">Available between 9:00 AM to 5:00 PM (30-minute slots)</p>
            </div>

            <div class="mb-6">
                <label for="reason" class="block text-gray-700 mb-2">Reason</label>
                <textarea id="reason" name="reason" rows="3" required
                    class="w-full px-3 py-2 border rounded-lg"></textarea>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                Book Appointment
            </button>
        </form>
    </div>
=======
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
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
</div>
@endsection