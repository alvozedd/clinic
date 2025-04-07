<?php

namespace App\Http\Controllers;

use App\Models\StaffSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class StaffScheduleController extends Controller
{
    /**
     * Display a listing of the staff schedules.
     */
    public function index()
    {
        $schedules = StaffSchedule::with('user')->get();
        return view('staff_schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new staff schedule.
     */
    public function create()
    {
        $staff = User::where('role', 'staff')->get(); // Only staff members
        return view('staff_schedules.create', compact('staff'));
    }

    /**
     * Store a newly created staff schedule in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required|string|in:available,busy,on_leave',
        ]);

        // Create the schedule
        StaffSchedule::create($request->all());

        return redirect()->route('staff-schedules.index')->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified staff schedule.
     */
    public function show(StaffSchedule $staffSchedule)
    {
        return view('staff_schedules.show', compact('staffSchedule'));
    }

    /**
     * Show the form for editing the specified staff schedule.
     */
    public function edit(StaffSchedule $staffSchedule)
    {
        $staff = User::where('role', 'staff')->get();
        return view('staff_schedules.edit', compact('staffSchedule', 'staff'));
    }

    /**
     * Update the specified staff schedule in the database.
     */
    public function update(Request $request, StaffSchedule $staffSchedule)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'status' => 'required|string|in:available,busy,on_leave',
        ]);

        // Update the schedule
        $staffSchedule->update($request->all());

        return redirect()->route('staff-schedules.index')->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the specified staff schedule from the database.
     */
    public function destroy(StaffSchedule $staffSchedule)
    {
        $staffSchedule->delete();
        return redirect()->route('staff-schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}