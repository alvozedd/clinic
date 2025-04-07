@extends('layouts.base')

@section('title', 'Patient Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Welcome, {{ auth()->user()->first_name }}</h1>

        

        <!-- Clinic Services -->
        <div class="bg-purple-50 p-6 rounded-lg mb-6">
            <h2 class="text-xl font-semibold mb-4">Our Clinic Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-medium mb-2">General Checkups</h3>
                    <p class="text-sm text-gray-600">Comprehensive health assessments</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-medium mb-2">Pediatric Care</h3>
                    <p class="text-sm text-gray-600">Dedicated care for children and teens</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-medium mb-2">Specialist Referrals</h3>
                    <p class="text-sm text-gray-600">Access to a wide network of specialists</p>
                </div>
            </div>
        </div>

        <!-- Appointments and Medical Records -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Upcoming Appointments -->
            <div class="bg-blue-50 p-4 rounded-lg">
                <h2 class="font-semibold text-lg mb-4">Upcoming Appointments</h2>
                @forelse($appointments as $appointment)
                    <div class="border-b pb-3 mb-3">
                        <p class="font-medium">Dr. {{ $appointment->doctor->user->last_name }}</p>
                        <p>{{ $appointment->appointment_date->format('l, F j, Y') }}</p>
                        <p>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }} - 
                           {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No upcoming appointments</p>
                @endforelse
                <a href="{{ route('appointments.create') }}" class="mt-4 inline-block text-blue-600 hover:underline">Book New Appointment</a>
            </div>

            <!-- Medical Records -->
            <div class="bg-green-50 p-4 rounded-lg">
                <h2 class="font-semibold text-lg mb-4">Recent Medical Records</h2>
                @forelse($medicalRecords as $record)
                    <div class="border-b pb-3 mb-3">
                        <p class="font-medium">{{ $record->visit_date->format('m/d/Y') }}</p>
                        <p class="text-sm">{{ Str::limit($record->diagnosis, 50) }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No medical records found</p>
                @endforelse
                <a href="{{ route('medical-records.index') }}" class="mt-4 inline-block text-green-600 hover:underline">View All Records</a>
            </div>
        </div>
    </div>
</div>
@endsection
