<!-- resources/views/admin/appointments/_form.blade.php -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="patient_id" class="block text-gray-700 mb-2">Patient</label>
        <select id="patient_id" name="patient_id" required
                class="w-full px-3 py-2 border rounded-lg">
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}" {{ (old('patient_id', $appointment->patient_id ?? '') == $patient->id) ? 'selected' : '' }}>
                    {{ $patient->user->getFullName() }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="doctor_id" class="block text-gray-700 mb-2">Doctor</label>
        <select id="doctor_id" name="doctor_id" required
                class="w-full px-3 py-2 border rounded-lg">
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ (old('doctor_id', $appointment->doctor_id ?? '') == $doctor->id) ? 'selected' : '' }}>
                    Dr. {{ $doctor->user->last_name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-4">
    <label for="secretary_id" class="block text-gray-700 mb-2">Secretary (Optional)</label>
    <select id="secretary_id" name="secretary_id"
            class="w-full px-3 py-2 border rounded-lg">
        <option value="">None</option>
        @foreach($secretaries as $secretary)
            <option value="{{ $secretary->id }}" {{ (old('secretary_id', $appointment->secretary_id ?? '') == $secretary->id) ? 'selected' : '' }}>
                {{ $secretary->user->getFullName() }}
            </option>
        @endforeach
    </select>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="appointment_date" class="block text-gray-700 mb-2">Date</label>
        <input type="date" id="appointment_date" name="appointment_date" required
               min="{{ date('Y-m-d') }}"
               value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
    <div>
        <label for="start_time" class="block text-gray-700 mb-2">Start Time</label>
        <input type="time" id="start_time" name="start_time" required
               min="08:00" max="17:00" step="1800"
               value="{{ old('start_time', $appointment->start_time ?? '') }}"
               class="w-full px-3 py-2 border rounded-lg">
    </div>
</div>

<div class="mb-4">
    <label for="reason" class="block text-gray-700 mb-2">Reason</label>
    <textarea id="reason" name="reason" rows="3" required
              class="w-full px-3 py-2 border rounded-lg">{{ old('reason', $appointment->reason ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="status" class="block text-gray-700 mb-2">Status</label>
    <select id="status" name="status" required
            class="w-full px-3 py-2 border rounded-lg">
        @foreach($statuses as $status)
            <option value="{{ $status }}" {{ (old('status', $appointment->status ?? '') === $status) ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>