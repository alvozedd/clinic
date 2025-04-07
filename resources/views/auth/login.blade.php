<!-- resources/views/auth/login.blade.php -->
@extends('layouts.base')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow p-6 mt-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Login to Your Account</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input type="email" id="email" name="email" required 
                   class="w-full px-3 py-2 border rounded-lg"
                   value="{{ old('email') }}">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="password" required 
                   class="w-full px-3 py-2 border rounded-lg">
        </div>

        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" 
                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Remember me
                </label>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
            Login
        </button>

        @if(config('features.registration_enabled'))
            <div class="mt-4 text-center">
                <p class="text-gray-600">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>
                </p>
            </div>
        @endif
    </form>
</div>
@endsection