<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\Inventory;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Display the predictive analytics dashboard.
     */
    public function index()
    {
        // Get total appointments
        $totalAppointments = Appointment::count();

        // Get low stock items
        $lowStockItems = Inventory::where('quantity', '<=', \DB::raw('reorder_level'))->get();

        // Get room utilization (example: percentage of rooms used)
        $totalRooms = \App\Models\Room::count();
        $usedRooms = \App\Models\Room::where('is_available', false)->count();
        $roomUtilization = $totalRooms > 0 ? ($usedRooms / $totalRooms) * 100 : 0;

        return view('analytics.index', compact('totalAppointments', 'lowStockItems', 'roomUtilization'));
    }
    public function getPatientDemographics()
{
    $patients = \App\Models\Patient::selectRaw('gender, COUNT(*) as count')
        ->groupBy('gender')
        ->get();

    return response()->json($patients);
}
public function getConditionPrevalence()
{
    $conditions = \App\Models\Appointment::selectRaw('diagnosis, COUNT(*) as count')
        ->groupBy('diagnosis')
        ->orderBy('count', 'desc')
        ->limit(5) // Top 5 conditions
        ->get();

    return response()->json($conditions);
}
public function getStaffPerformance()
{
    $staffPerformance = \App\Models\Appointment::selectRaw('staff_id, COUNT(*) as appointments')
        ->groupBy('staff_id')
        ->orderBy('appointments', 'desc')
        ->with('staff') // Eager load staff details
        ->get();

    return response()->json($staffPerformance);
}
}