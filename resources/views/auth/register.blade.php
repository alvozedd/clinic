@extends('layouts.base')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow p-6 mt-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Create an Account</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="first_name" class="block text-gray-700 mb-2">First Name</label>
                <input type="text" id="first_name" name="first_name" required 
                       class="w-full px-3 py-2 border rounded-lg"
                       value="{{ old('first_name') }}">
            </div>
            <div>
                <label for="last_name" class="block text-gray-700 mb-2">Last Name</label>
                <input type="text" id="last_name" name="last_name" required 
                       class="w-full px-3 py-2 border rounded-lg"
                       value="{{ old('last_name') }}">
            </div>
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input type="email" id="email" name="email" required 
                   class="w-full px-3 py-2 border rounded-lg"
                   value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="password" required 
                   class="w-full px-3 py-2 border rounded-lg">
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required 
                   class="w-full px-3 py-2 border rounded-lg">
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
            Register
        </button>

        <div class="mt-4 text-center">
            <p class="text-gray-600">Already have an account? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>
            </p>
        </div>
    </form>
</div>
@endsection
