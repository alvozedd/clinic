<!-- resources/views/secretary/dashboard.blade.php -->
@extends('layouts.base')

@section('title', 'Secretary Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Welcome, {{ auth()->user()->first_name }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h2 class="font-semibold text-lg mb-2">Today's Appointments</h2>
                <p class="text-3xl font-bold">{{ $todayAppointmentsCount }}</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <h2 class="font-semibold text-lg mb-2">Pending Approvals</h2>
                <p class="text-3xl font-bold">{{ $pendingAppointmentsCount }}</p>
            </div>
            <div class="bg-yellow-50 p-4 rounded-lg">
                <h2 class="font-semibold text-lg mb-2">Total Patients</h2>
                <p class="text-3xl font-bold">{{ $patientsCount }}</p>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Recent Appointments</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Patient</th>
                            <th class="py-2 px-4 border-b">Doctor</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Time</th>
                            <th class="py-2 px-4 border-b">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentAppointments as $appointment)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $appointment->patient->user->getFullName() }}</td>
                            <td class="py-2 px-4 border-b">Dr. {{ $appointment->doctor->user->last_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $appointment->appointment_date->format('M j, Y') }}</td>
                            <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $appointment->status === 'scheduled' ? 'bg-green-100 text-green-800' : 
                                       ($appointment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">No appointments found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('appointments.create') }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Create New Appointment
            </a>
        </div>
    </div>
</div>
@endsection