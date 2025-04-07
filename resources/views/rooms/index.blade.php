@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Add New Room</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->type }}</td>
                <td>{{ $room->is_available ? 'Available' : 'Unavailable' }}</td>
                <td>
                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
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
