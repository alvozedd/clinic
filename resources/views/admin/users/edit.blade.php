<!-- resources/views/admin/users/edit.blade.php -->
@extends('layouts.base')

@section('title', 'Edit User')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit User: {{ $user->getFullName() }}</h1>
    
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')
        @include('admin.users._form', ['user' => $user, 'roles' => $roles])
        
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.users.index') }}" 
               class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Update User
            </button>
        </div>
    </form>
</div>
@endsection