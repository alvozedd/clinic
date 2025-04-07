@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Inventory Item</h1>
    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $inventory->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $inventory->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $inventory->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="reorder_level">Reorder Level</label>
            <input type="number" name="reorder_level" class="form-control" value="{{ $inventory->reorder_level }}" required>
        </div>
        <div class="form-group">
            <label for="unit_price">Unit Price</label>
            <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ $inventory->unit_price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection