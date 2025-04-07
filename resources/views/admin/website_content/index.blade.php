@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Website Content</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
            <tr>
                <td>{{ $content->key }}</td>
                <td>{{ $content->value }}</td>
                <td>
                    <a href="{{ route('admin.website_content.edit', $content->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection