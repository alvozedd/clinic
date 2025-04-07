<!-- resources/views/admin/patients/_form.blade.php -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="first_name" class="block text-gray-700 mb-2">First Name</label>
        <input type="text" id="first_name" name="first_name" required
               value="{{ old('first_name', $patient->user->first_name ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
    <div>
        <label for="last_name" class="block text-gray-700 mb-2">Last Name</label>
        <input type="text" id="last_name" name="last_name" required
               value="{{ old('last_name', $patient->user->last_name ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
</div>

<div class="mb-4">
    <label for="email" class="block text-gray-700 mb-2">Email</label>
    <input type="email" id="email" name="email" required
           value="{{ old('email', $patient->user->email ?? '') }}"
           class="w-full px-3 py-2 border rounded-lg">
</div>

@if(!isset($patient))
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

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="phone" class="block text-gray-700 mb-2">Phone</label>
        <input type="text" id="phone" name="phone"
               value="{{ old('phone', $patient->user->phone ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
    <div>
        <label for="date_of_birth" class="block text-gray-700 mb-2">Date of Birth</label>
        <input type="date" id="date_of_birth" name="date_of_birth"
               value="{{ old('date_of_birth', $patient->user->date_of_birth ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
</div>

<div class="mb-4">
    <label for="address" class="block text-gray-700 mb-2">Address</label>
    <textarea id="address" name="address" rows="2"
              class="w-full px-3 py-2 border rounded-lg">{{ old('address', $patient->user->address ?? '') }}</textarea>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="blood_type" class="block text-gray-700 mb-2">Blood Type</label>
        <select id="blood_type" name="blood_type"
                class="w-full px-3 py-2 border rounded-lg">
            <option value="">Select Blood Type</option>
            <option value="A+" {{ old('blood_type', $patient->blood_type ?? '') == 'A+' ? 'selected' : '' }}>A+</option>
            <option value="A-" {{ old('blood_type', $patient->blood_type ?? '') == 'A-' ? 'selected' : '' }}>A-</option>
            <option value="B+" {{ old('blood_type', $patient->blood_type ?? '') == 'B+' ? 'selected' : '' }}>B+</option>
            <option value="B-" {{ old('blood_type', $patient->blood_type ?? '') == 'B-' ? 'selected' : '' }}>B-</option>
            <option value="AB+" {{ old('blood_type', $patient->blood_type ?? '') == 'AB+' ? 'selected' : '' }}>AB+</option>
            <option value="AB-" {{ old('blood_type', $patient->blood_type ?? '') == 'AB-' ? 'selected' : '' }}>AB-</option>
            <option value="O+" {{ old('blood_type', $patient->blood_type ?? '') == 'O+' ? 'selected' : '' }}>O+</option>
            <option value="O-" {{ old('blood_type', $patient->blood_type ?? '') == 'O-' ? 'selected' : '' }}>O-</option>
        </select>
    </div>
    <div>
        <label for="insurance_info" class="block text-gray-700 mb-2">Insurance Info</label>
        <input type="text" id="insurance_info" name="insurance_info"
               value="{{ old('insurance_info', $patient->insurance_info ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
</div>

<div class="mb-4">
    <label for="allergies" class="block text-gray-700 mb-2">Allergies</label>
    <textarea id="allergies" name="allergies" rows="2"
              class="w-full px-3 py-2 border rounded-lg">{{ old('allergies', $patient->allergies ?? '') }}</textarea>
</div>