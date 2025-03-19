<?php

use Illuminate\Support\Facades\Route;
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