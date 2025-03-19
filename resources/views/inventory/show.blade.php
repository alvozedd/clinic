@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventory Item Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $inventory->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $inventory->description }}</p>
            <p class="card-text"><strong>Quantity:</strong> {{ $inventory->quantity }}</p>
            <p class="card-text"><strong>Reorder Level:</strong> {{ $inventory->reorder_level }}</p>
            <p class="card-text"><strong>Unit Price:</strong> {{ $inventory->unit_price }}</p>
            <a href="{{ route('inventory.edit', $inventory->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection