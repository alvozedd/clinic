@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventory</h1>
    <a href="{{ route('inventory.create') }}" class="btn btn-primary mb-3">Add New Item</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Reorder Level</th>
                <th>Unit Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventory as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->reorder_level }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>
                    <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
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