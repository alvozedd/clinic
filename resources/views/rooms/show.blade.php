@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Room Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $room->name }}</h5>
            <p class="card-text"><strong>Type:</strong> {{ $room->type }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $room->description }}</p>
            <p class="card-text"><strong>Availability:</strong> {{ $room->is_available ? 'Available' : 'Unavailable' }}</p>
            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection