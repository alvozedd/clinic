@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Patient</h1>
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Corrected this line -->
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $patient->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $patient->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $patient->date_of_birth }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="Male" {{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $patient->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="{{ $patient->contact_number }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $patient->email }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control">{{ $patient->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="medical_history">Medical History</label>
            <textarea name="medical_history" class="form-control">{{ $patient->medical_history }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection