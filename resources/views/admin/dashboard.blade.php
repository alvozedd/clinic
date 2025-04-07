<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.base')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-8">Admin Dashboard</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Users Card -->
        <div class="bg-blue-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Users</h2>
            <p class="text-3xl font-bold">{{ $usersCount }}</p>
            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">View All</a>
            
        </div>

        <!-- Appointments Card -->
        <div class="bg-green-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Appointments</h2>
            <p class="text-3xl font-bold">{{ $appointmentsCount }}</p>
                        <!-- resources/views/admin/dashboard.blade.php -->
            <a href="{{ route('admin.appointments.index') }}" class="text-green-600 hover:underline mt-2 inline-block">View All</a>
        </div>

        <!-- Patients Card -->
        <div class="bg-yellow-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Patients</h2>
            <p class="text-3xl font-bold">{{ $patientsCount }}</p>
            <!-- resources/views/admin/dashboard.blade.php -->
            <a href="{{ route('admin.patients.index') }}" class="text-yellow-600 hover:underline mt-2 inline-block">View All</a>            </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2 px-4">Type</th>
                        <th class="text-left py-2 px-4">Description</th>
                        <th class="text-left py-2 px-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample activity items - replace with real data -->
                    <tr class="border-b">
                        <td class="py-2 px-4">User</td>
                        <td class="py-2 px-4">New patient registered</td>
                        <td class="py-2 px-4">{{ now()->subHours(2)->format('M j, Y g:i A') }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">Appointment</td>
                        <td class="py-2 px-4">New appointment scheduled</td>
                        <td class="py-2 px-4">{{ now()->subDays(1)->format('M j, Y g:i A') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
