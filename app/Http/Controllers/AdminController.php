<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;
use App\Models\Staff;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'appointmentsCount' => Appointment::count(),
            'patientsCount' => Patient::count(),
            'doctorsCount' => User::where('role', 'doctor')->count(),
            'secretariesCount' => User::where('role', 'secretary')->count(),
            'recentUsers' => User::latest()->take(5)->get()
        ]);
    }

    public function createStaff()
    {
        return view('admin.staff.create');
    }

    public function storeStaff(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:doctor,secretary',
            'specialization' => 'required_if:role,doctor|string|max:255|nullable',
            'license_number' => 'required_if:role,doctor|string|max:255|nullable',
            'hire_date' => 'required|date',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Staff::create([
            'user_id' => $user->id,
            'specialization' => $request->specialization,
            'license_number' => $request->license_number,
            'hire_date' => $request->hire_date,
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', ucfirst($request->role) . ' created successfully!');
    }

    public function usersIndex()
    {
        return view('admin.users.index', [
            'users' => User::with(['patient', 'staff'])->latest()->paginate(10)
        ]);
    }

    public function createUser()
    {
        return view('admin.users.create', [
            'roles' => ['admin', 'doctor', 'secretary', 'patient']
        ]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,doctor,secretary,patient'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => true
        ]);

        if ($request->role === 'patient') {
            Patient::create(['user_id' => $user->id]);
        } else {
            Staff::create([
                'user_id' => $user->id,
                'specialization' => $request->role === 'doctor' ? 'General Practitioner' : null,
                'hire_date' => now()
            ]);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully!');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => ['admin', 'doctor', 'secretary', 'patient']
        ]);
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,doctor,secretary,patient',
            'is_active' => 'required|boolean'
        ]);

        $user->update($request->only(['first_name', 'last_name', 'email', 'role', 'is_active']));

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully!');
    }

    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }

    // Temporary debug method - remove after testing
    public function debug()
    {
        return [
            'users' => User::all(),
            'patients' => Patient::all(),
            'appointments' => Appointment::all(),
            'staff' => Staff::all()
        ];
    }
}
=======
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
{
    $totalPatients = \App\Models\Patient::count();
    $totalAppointments = \App\Models\Appointment::count();
    $lowStockItems = \App\Models\Inventory::where('quantity', '<=', \DB::raw('reorder_level'))->count();

    return view('admin.dashboard', compact('totalPatients', 'totalAppointments', 'lowStockItems'));
}
}
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
