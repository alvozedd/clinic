<!-- resources/views/partials/footer.blade.php -->
<footer class="bg-white border-t border-gray-200 mt-8">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <p class="text-gray-600">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-600 hover:text-blue-600">Privacy Policy</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Terms of Service</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Contact Us</a>
            </div>
        </div>
    </div>
</footer>