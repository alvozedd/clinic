<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Inventory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    /**
     * Export appointments as CSV.
     */
    public function exportAppointmentsCSV()
    {
        $appointments = Appointment::with(['patient', 'staff'])->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="appointments.csv"',
        ];

        $callback = function () use ($appointments) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Patient', 'Staff', 'Date', 'Status']);

            foreach ($appointments as $appointment) {
                fputcsv($file, [
                    $appointment->id,
                    $appointment->patient->name,
                    $appointment->staff->name,
                    $appointment->appointment_date,
                    $appointment->status,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Export patients as PDF.
     */
    public function exportPatientsPDF()
    {
        $patients = Patient::all();

        $pdf = Pdf::loadView('reports.patients', compact('patients'));
        return $pdf->download('patients.pdf');
    }

    /**
     * Export inventory as CSV.
     */
    public function exportInventoryCSV()
    {
        $inventory = Inventory::all();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="inventory.csv"',
        ];

        $callback = function () use ($inventory) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Name', 'Quantity', 'Reorder Level', 'Unit Price']);

            foreach ($inventory as $item) {
                fputcsv($file, [
                    $item->id,
                    $item->name,
                    $item->quantity,
                    $item->reorder_level,
                    $item->unit_price,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}