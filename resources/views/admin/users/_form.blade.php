<!-- resources/views/admin/users/_form.blade.php -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="first_name" class="block text-gray-700 mb-2">First Name</label>
        <input type="text" id="first_name" name="first_name" required
               value="{{ old('first_name', $user->first_name ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
    <div>
        <label for="last_name" class="block text-gray-700 mb-2">Last Name</label>
        <input type="text" id="last_name" name="last_name" required
               value="{{ old('last_name', $user->last_name ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
</div>

<div class="mb-4">
    <label for="email" class="block text-gray-700 mb-2">Email</label>
    <input type="email" id="email" name="email" required
           value="{{ old('email', $user->email ?? '') }}"
           class="w-full px-3 py-2 border rounded-lg">
</div>

@if(!isset($user))
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="password" class="block text-gray-700 mb-2">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full px-3 py-2 border rounded-lg">
    </div>
    <div>
        <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
               class="w-full px-3 py-2 border rounded-lg">
    </div>
</div>
@endif

<div class="mb-4">
    <label for="role" class="block text-gray-700 mb-2">Role</label>
    <select id="role" name="role" required class="w-full px-3 py-2 border rounded-lg">
        @foreach($roles as $role)
            @php
                $selected = old('role', isset($user) ? $user->role : '') == $role ? 'selected' : '';
            @endphp
            <option value="{{ $role }}" {{ $selected }}>
                {{ ucfirst($role) }}
            </option>
        @endforeach
    </select>
</div>

@if(isset($user))
<div class="mb-4">
    <label class="inline-flex items-center">
        <input type="checkbox" name="is_active" value="1" 
               {{ old('is_active', $user->is_active) ? 'checked' : '' }}
               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        <span class="ml-2">Active User</span>
    </label>
</div>
@endif