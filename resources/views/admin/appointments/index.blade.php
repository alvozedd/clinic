<!-- resources/views/admin/appointments/index.blade.php -->
@extends('layouts.base')

@section('title', 'Manage Appointments')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Appointment Management</h1>
        <a href="{{ route('admin.appointments.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Create Appointment
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Patient</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Doctor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($appointments as $appointment)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->patient->user->getFullName() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">Dr. {{ $appointment->doctor->user->last_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->appointment_date->format('M j, Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }} - 
                        {{ Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $appointment->status === 'scheduled' ? 'bg-blue-100 text-blue-800' : 
                               ($appointment->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.appointments.edit', $appointment) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                        <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" 
                                onclick="return confirm('Are you sure you want to delete this appointment?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $appointments->links() }}
        </div>
    </div>
</div>
@endsection