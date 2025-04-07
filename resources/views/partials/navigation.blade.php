<nav class="bg-white shadow">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-blue-600">
                    {{ config('app.name') }}
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-blue-600">Admin</a>
                    @endif

                    <span class="text-gray-700">{{ auth()->user()->getFullName() }}</span>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-blue-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
                    @if(config('auth.registration_enabled', true))
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>
