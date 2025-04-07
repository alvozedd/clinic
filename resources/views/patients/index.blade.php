@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add New Patient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->contact_number }}</td>
                <td>
                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection