@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Staff Schedule</h1>
    <form action="{{ route('staff-schedules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Staff</label>
            <select name="user_id" class="form-control" required>
                @foreach ($staff as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="available">Available</option>
                <option value="busy">Busy</option>
                <option value="on_leave">On Leave</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection