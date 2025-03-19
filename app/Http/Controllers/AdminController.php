<?php

namespace App\Http\Controllers;

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