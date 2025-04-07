@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Patient</h1>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="medical_history">Medical History</label>
            <textarea name="medical_history" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection