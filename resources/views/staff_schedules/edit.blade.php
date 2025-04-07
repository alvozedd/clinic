@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Staff Schedule</h1>
    <form action="{{ route('staff-schedules.update', $staffSchedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">Staff</label>
            <select name="user_id" class="form-control" required>
                @foreach ($staff as $user)
                <option value="{{ $user->id }}" {{ $staffSchedule->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $staffSchedule->date }}" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ $staffSchedule->start_time }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ $staffSchedule->end_time }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="available" {{ $staffSchedule->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="busy" {{ $staffSchedule->status == 'busy' ? 'selected' : '' }}>Busy</option>
                <option value="on_leave" {{ $staffSchedule->status == 'on_leave' ? 'selected' : '' }}>On Leave</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection