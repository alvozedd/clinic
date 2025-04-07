<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ClinicSeeder extends Seeder
{
    public function run()
    {
        // Create Admin
        $admin = User::create([
            'first_name' => 'Clinic',
            'last_name' => 'Admin',
            'email' => 'admin@clinic.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        Staff::create([
            'user_id' => $admin->id,
            'specialization' => 'System Administrator',
            'hire_date' => Carbon::now(),
        ]);

        // Create Doctor
        $doctor = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'doctor@clinic.com',
            'password' => Hash::make('doctor123'),
            'role' => 'doctor',
            'is_active' => true,
        ]);

        Staff::create([
            'user_id' => $doctor->id,
            'specialization' => 'General Practitioner',
            'license_number' => 'MD-123456',
            'hire_date' => Carbon::now()->subYears(5),
        ]);

        // Create Secretary
        $secretary = User::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'secretary@clinic.com',
            'password' => Hash::make('secretary123'),
            'role' => 'secretary',
            'is_active' => true,
        ]);

        Staff::create([
            'user_id' => $secretary->id,
            'hire_date' => Carbon::now()->subYear(),
        ]);

        // Create Sample Patients
        $patients = [
            [
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael@example.com',
                'blood_type' => 'A+',
                'allergies' => 'Penicillin',
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Williams',
                'email' => 'sarah@example.com',
                'blood_type' => 'O-',
                'allergies' => null,
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'email' => 'david@example.com',
                'blood_type' => 'B+',
                'allergies' => 'Shellfish',
            ],
        ];

        foreach ($patients as $patientData) {
            $user = User::create([
                'first_name' => $patientData['first_name'],
                'last_name' => $patientData['last_name'],
                'email' => $patientData['email'],
                'password' => Hash::make('password123'),
                'role' => 'patient',
                'is_active' => true,
            ]);

            Patient::create([
                'user_id' => $user->id,
                'blood_type' => $patientData['blood_type'],
                'allergies' => $patientData['allergies'],
            ]);
        }

        // Create Sample Appointments
        $appointments = [
            [
                'patient_id' => 2, // Michael Johnson
                'doctor_id' => 1,  // Dr. Doe
                'appointment_date' => Carbon::tomorrow(),
                'start_time' => '09:00:00',
                'status' => 'scheduled',
                'reason' => 'Annual checkup',
            ],
            [
                'patient_id' => 3, // Sarah Williams
                'doctor_id' => 1,  // Dr. Doe
                'appointment_date' => Carbon::tomorrow(),
                'start_time' => '10:30:00',
                'status' => 'scheduled',
                'reason' => 'Back pain consultation',
            ],
        ];

        foreach ($appointments as $appointmentData) {
            Appointment::create([
                'patient_id' => $appointmentData['patient_id'],
                'doctor_id' => $appointmentData['doctor_id'],
                'appointment_date' => $appointmentData['appointment_date'],
                'start_time' => $appointmentData['start_time'],
                'end_time' => Carbon::parse($appointmentData['start_time'])->addMinutes(30),
                'status' => $appointmentData['status'],
                'reason' => $appointmentData['reason'],
                'secretary_id' => 1, // Jane Smith
            ]);
        }

        $this->command->info('Clinic test data seeded successfully!');
        $this->command->info('Admin credentials: admin@clinic.com / admin123');
        $this->command->info('Doctor credentials: doctor@clinic.com / doctor123');
        $this->command->info('Secretary credentials: secretary@clinic.com / secretary123');
        $this->command->info('Patient credentials: [email from list] / password123');
    }
}