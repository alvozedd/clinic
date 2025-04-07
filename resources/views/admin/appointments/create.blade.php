<!-- resources/views/admin/appointments/create.blade.php -->
@extends('layouts.base')

@section('title', 'Create Appointment')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Create New Appointment</h1>
    
    <form method="POST" action="{{ route('admin.appointments.store') }}">
        @csrf
        @include('admin.appointments._form', [
            'appointment' => null,
            'patients' => $patients,
            'doctors' => $doctors,
            'secretaries' => $secretaries,
            'statuses' => ['scheduled', 'completed', 'cancelled']
        ])
        
        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Create Appointment
        </button>
    </form>
</div>
@endsection