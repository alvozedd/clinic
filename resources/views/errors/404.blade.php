// resources/views/errors/404.blade.php
@extends('layouts.base')

@section('title', 'Page Not Found')

@section('content')
<div class="max-w-md mx-auto text-center py-12">
    <h1 class="text-5xl font-bold text-gray-800 mb-4">404</h1>
    <p class="text-xl text-gray-600 mb-8">The page you requested could not be found.</p>
    <a href="/" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
        Return Home
    </a>
</div>
@endsection