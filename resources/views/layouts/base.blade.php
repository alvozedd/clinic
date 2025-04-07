<!-- resources/views/layouts/base.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    @include('partials.navigation')
    
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>