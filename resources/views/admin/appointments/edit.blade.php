<!-- resources/views/admin/appointments/edit.blade.php -->
@extends('layouts.base')

@section('title', 'Edit Appointment')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Appointment</h1>
    
    <form method="POST" action="{{ route('admin.appointments.update', $appointment) }}">
        @csrf
        @method('PUT')
        @include('admin.appointments._form', [
            'appointment' => $appointment,
            'patients' => $patients,
            'doctors' => $doctors,
            'secretaries' => $secretaries,
            'statuses' => $statuses
        ])
        
        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Update Appointment
        </button>
    </form>
</div>
@endsection