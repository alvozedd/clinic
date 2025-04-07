<!-- resources/views/admin/staff/create.blade.php -->
@extends('layouts.base')

@section('title', 'Add Staff')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Add New Staff Member</h1>
        
        <form method="POST" action="{{ route('admin.staff.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="first_name" class="block text-gray-700 mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name" required
                           class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div>
                    <label for="last_name" class="block text-gray-700 mb-2">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required
                           class="w-full px-3 py-2 border rounded-lg">
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           class="w-full px-3 py-2 border rounded-lg">
                </div>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700 mb-2">Role</label>
                <select id="role" name="role" required
                        class="w-full px-3 py-2 border rounded-lg">
                    <option value="">Select Role</option>
                    <option value="doctor">Doctor</option>
                    <option value="secretary">Secretary</option>
                </select>
            </div>

            <div id="doctor-fields" class="hidden">
                <div class="mb-4">
                    <label for="specialization" class="block text-gray-700 mb-2">Specialization</label>
                    <input type="text" id="specialization" name="specialization"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="license_number" class="block text-gray-700 mb-2">License Number</label>
                    <input type="text" id="license_number" name="license_number"
                           class="w-full px-3 py-2 border rounded-lg">
                </div>
            </div>

            <div class="mb-6">
                <label for="hire_date" class="block text-gray-700 mb-2">Hire Date</label>
                <input type="date" id="hire_date" name="hire_date" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                Create Staff
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('role').addEventListener('change', function() {
        const doctorFields = document.getElementById('doctor-fields');
        if (this.value === 'doctor') {
            doctorFields.classList.remove('hidden');
            // Make doctor-specific fields required
            document.getElementById('specialization').required = true;
            document.getElementById('license_number').required = true;
        } else {
            doctorFields.classList.add('hidden');
            // Remove required from doctor-specific fields
            document.getElementById('specialization').required = false;
            document.getElementById('license_number').required = false;
        }
    });
</script>
@endsection