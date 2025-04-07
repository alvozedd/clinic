@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                <option value="Consultation">Consultation</option>
                <option value="Operation">Operation</option>
                <option value="Recovery">Recovery</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="is_available">Availability</label>
            <select name="is_available" class="form-control" required>
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection