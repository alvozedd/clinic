@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Website Content</h1>
    <form action="{{ route('admin.website_content.update', $content->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="value">{{ $content->key }}</label>
            <textarea name="value" class="form-control" rows="5">{{ $content->value }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection