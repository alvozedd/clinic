<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\MedicalRecordController;
use App\Models\User; // Add User model import

// ===============================
// Guest Routes (Only not logged in)
// ===============================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// ===============
// Logout Route
// ===============
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ===============
// Home Route
// ===============
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->isDoctor()) {
            return redirect()->route('doctor.dashboard');
        }
        if ($user->isSecretary()) {
            return redirect()->route('secretary.dashboard');
        }
        return redirect()->route('patient.dashboard');
    }
    return redirect()->route('login');
});

// ===============================
// Protected Routes (Authenticated)
// ===============================
Route::middleware(['auth'])->group(function () {

    // ===============================
    // Admin Routes
    // ===============================
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Staff Management
        Route::get('/admin/staff/create', [AdminController::class, 'createStaff'])->name('admin.staff.create');
        Route::post('/admin/staff', [AdminController::class, 'storeStaff'])->name('admin.staff.store');

        // User Management
        Route::get('/admin/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
        Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
        Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
        Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

        // Appointment Management
        Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::get('/admin/appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
        Route::post('/admin/appointments', [AppointmentController::class, 'store'])->name('admin.appointments.store');
        Route::get('/admin/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
        Route::put('/admin/appointments/{appointment}', [AppointmentController::class, 'update'])->name('admin.appointments.update');
        Route::delete('/admin/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('admin.appointments.destroy');

        // Patient Management
        Route::get('/admin/patients', [PatientController::class, 'index'])->name('admin.patients.index');
        Route::get('/admin/patients/create', [PatientController::class, 'create'])->name('admin.patients.create');
        Route::post('/admin/patients', [PatientController::class, 'store'])->name('admin.patients.store');
        Route::get('/admin/patients/{patient}/edit', [PatientController::class, 'edit'])->name('admin.patients.edit');
        Route::put('/admin/patients/{patient}', [PatientController::class, 'update'])->name('admin.patients.update');
        Route::delete('/admin/patients/{patient}', [PatientController::class, 'destroy'])->name('admin.patients.destroy');
    });

    // ===============================
    // Doctor Routes
    // ===============================
    Route::middleware(['role:doctor'])->group(function () {
        Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    });

    // ===============================
    // Secretary Routes
    // ===============================
    Route::middleware(['role:secretary'])->group(function () {
        Route::get('/secretary/dashboard', [SecretaryController::class, 'dashboard'])->name('secretary.dashboard');
        // Add more secretary routes as needed
    });

    // ===============================
    // Patient Routes
    // ===============================
    Route::middleware(['role:patient'])->group(function () {
        Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');

        // Appointment Routes (Patient)
        Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/appointments', [AppointmentController::class, 'storeForPatient'])->name('appointments.store');

        // Medical Records (Patient View Only)
        Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('medical-records.index');
    });

    // ===============================
    // Medical Record Routes (Doctor/Admin Only)
    // ===============================
    Route::middleware(['role:doctor|admin'])->group(function () {
        Route::resource('medical-records', MedicalRecordController::class)->except(['index']);
    });
});
=======
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\StaffScheduleController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WelcomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Patient Routes
Route::resource('patients', PatientController::class)->middleware('auth');

// Appointment Routes
Route::resource('appointments', AppointmentController::class)->middleware('auth');

// Staff Schedule Routes
Route::resource('staff-schedules', StaffScheduleController::class)->middleware('auth');

//Inventory Routes
Route::resource('inventory', InventoryController::class)->middleware('auth');

//Rooms Routes
Route::resource('rooms', RoomController::class)->middleware('auth');

//Analytics Routes
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index')->middleware('auth');

//
Route::get('/analytics/patient-demographics', [AnalyticsController::class, 'getPatientDemographics'])
    ->name('analytics.patient-demographics')
    ->middleware('auth');

    Route::get('/analytics/condition-prevalence', [AnalyticsController::class, 'getConditionPrevalence'])
    ->name('analytics.condition-prevalence')
    ->middleware('auth');

    Route::get('/analytics/staff-performance', [AnalyticsController::class, 'getStaffPerformance'])
    ->name('analytics.staff-performance')
    ->middleware('auth');

    

    Route::get('/reports/appointments/csv', [ReportController::class, 'exportAppointmentsCSV'])
        ->name('reports.appointments.csv')
        ->middleware('auth');
    
    Route::get('/reports/patients/pdf', [ReportController::class, 'exportPatientsPDF'])
        ->name('reports.patients.pdf')
        ->middleware('auth');
    
    Route::get('/reports/inventory/csv', [ReportController::class, 'exportInventoryCSV'])
        ->name('reports.inventory.csv')
        ->middleware('auth');

        

        Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

        Route::middleware(['auth', 'role:doctor'])->group(function () {
            // Doctor (Owner) routes
            Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        });
        
        Route::middleware(['auth', 'role:secretary'])->group(function () {
            // Secretary routes
            Route::get('/secretary', [SecretaryController::class, 'index'])->name('secretary.dashboard');
        });
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
