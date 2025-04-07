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
        <div class="bg-blue-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Total Users</h2>
            <p class="text-3xl font-bold">{{ $usersCount }}</p>
        </div>
        <div class="bg-green-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Appointments</h2>
            <p class="text-3xl font-bold">{{ $appointmentsCount }}</p>
        </div>
        <div class="bg-yellow-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Patients</h2>
            <p class="text-3xl font-bold">{{ $patientsCount }}</p>
        </div>
        <div class="bg-purple-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Doctors</h2>
            <p class="text-3xl font-bold">{{ $doctorsCount }}</p>
        </div>
        <div class="bg-pink-50 p-4 rounded-lg">
            <h2 class="font-semibold text-lg mb-2">Secretaries</h2>
            <p class="text-3xl font-bold">{{ $secretariesCount }}</p>
        </div>
    </div>

    @if($recentUsers->count() > 0)
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">Recent Users</h2>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="text-left py-2 px-4">Name</th>
                    <th class="text-left py-2 px-4">Email</th>
                    <th class="text-left py-2 px-4">Role</th>
                    <th class="text-left py-2 px-4">Joined</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentUsers as $user)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $user->getFullName() }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4 capitalize">{{ $user->role }}</td>
                    <td class="py-2 px-4">{{ $user->created_at->format('M j, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Staff Management</h2>
            <a href="{{ route('admin.staff.create') }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Add New Staff
            </a>
        </div>
        <!-- Staff list table would go here -->
    </div>
</div>
@endsection
