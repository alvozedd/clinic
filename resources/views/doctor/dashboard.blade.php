@extends('layouts.base')

@section('title', 'Doctor Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Welcome, Dr. {{ auth()->user()->last_name }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Today's Appointments -->
            <div class="bg-blue-50 p-4 rounded-lg">
                <h2 class="font-semibold text-lg mb-4">Today's Appointments ({{ $todayAppointments->count() }})</h2>
                @forelse($todayAppointments as $appointment)
                    <div class="border-b pb-3 mb-3">
                        <p class="font-medium">{{ $appointment->patient->user->getFullName() }}</p>
                        <p>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}</p>
                        <p class="text-sm text-gray-600">{{ $appointment->reason }}</p>
                        <a href="#" class="text-blue-600 text-sm hover:underline">View Details</a>
                    </div>
                @empty
                    <p class="text-gray-600">No appointments scheduled for today</p>
                @endforelse
            </div>

            <!-- Upcoming Appointments -->
            <div class="bg-green-50 p-4 rounded-lg">
                <h2 class="font-semibold text-lg mb-4">Upcoming Appointments ({{ $upcomingAppointments->count() }})</h2>
                @forelse($upcomingAppointments as $appointment)
                    <div class="border-b pb-3 mb-3">
                        <p class="font-medium">{{ $appointment->patient->user->getFullName() }}</p>
                        <p>{{ $appointment->appointment_date->format('D, M j, Y') }}</p>
                        <p>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}</p>
                        <p class="text-sm text-gray-600">{{ $appointment->reason }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No upcoming appointments</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
