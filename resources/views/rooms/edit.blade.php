@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                <option value="Consultation" {{ $room->type == 'Consultation' ? 'selected' : '' }}>Consultation</option>
                <option value="Operation" {{ $room->type == 'Operation' ? 'selected' : '' }}>Operation</option>
                <option value="Recovery" {{ $room->type == 'Recovery' ? 'selected' : '' }}>Recovery</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $room->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="is_available">Availability</label>
            <select name="is_available" class="form-control" required>
                <option value="1" {{ $room->is_available ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$room->is_available ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection