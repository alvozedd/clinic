@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Inventory Item</h1>
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="reorder_level">Reorder Level</label>
            <input type="number" name="reorder_level" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit_price">Unit Price</label>
            <input type="number" step="0.01" name="unit_price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection