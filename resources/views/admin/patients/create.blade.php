<!-- resources/views/admin/patients/create.blade.php -->
@extends('layouts.base')

@section('title', 'Create Patient')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Create New Patient</h1>
        
        <form method="POST" action="{{ route('admin.patients.store') }}">
            @csrf
            
            <!-- Personal Information Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4 pb-2 border-b">Personal Information</h2>
                @include('admin.patients._form', ['patient' => null])
            </div>

            <!-- Medical Information Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4 pb-2 border-b">Medical Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="blood_type" class="block text-gray-700 mb-2">Blood Type</label>
                        <select id="blood_type" name="blood_type"
                                class="w-full px-3 py-2 border rounded-lg">
                            <option value="">Select Blood Type</option>
                            @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $type)
                                <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="insurance_info" class="block text-gray-700 mb-2">Insurance Info</label>
                        <input type="text" id="insurance_info" name="insurance_info"
                               value="{{ old('insurance_info') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="allergies" class="block text-gray-700 mb-2">Allergies</label>
                    <textarea id="allergies" name="allergies" rows="3"
                              class="w-full px-3 py-2 border rounded-lg">{{ old('allergies') }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.patients.index') }}" 
                   class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Create Patient
                </button>
            </div>
        </form>
    </div>
</div>
@endsection