@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Staff Schedules</h1>
    <a href="{{ route('staff-schedules.create') }}" class="btn btn-primary mb-3">Add New Schedule</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Staff</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->id }}</td>
                <td>{{ $schedule->user->name }}</td>
                <td>{{ $schedule->date }}</td>
                <td>{{ $schedule->start_time }}</td>
                <td>{{ $schedule->end_time }}</td>
                <td>{{ $schedule->status }}</td>
                <td>
                    <a href="{{ route('staff-schedules.show', $schedule->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('staff-schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('staff-schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
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