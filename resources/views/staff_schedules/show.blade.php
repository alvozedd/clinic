@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Staff Schedule Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Schedule #{{ $staffSchedule->id }}</h5>
            <p class="card-text"><strong>Staff:</strong> {{ $staffSchedule->user->name }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $staffSchedule->date }}</p>
            <p class="card-text"><strong>Start Time:</strong> {{ $staffSchedule->start_time }}</p>
            <p class="card-text"><strong>End Time:</strong> {{ $staffSchedule->end_time }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $staffSchedule->status }}</p>
            <a href="{{ route('staff-schedules.edit', $staffSchedule->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('staff-schedules.destroy', $staffSchedule->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection