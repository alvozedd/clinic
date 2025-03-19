<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB; // Add this line
use Illuminate\Support\Facades\Mail;
use App\Mail\LowStockAlert;
use App\Models\Inventory;

class CheckLowStock extends Command
{
    protected $signature = 'inventory:check-low-stock';
    protected $description = 'Check for low stock levels and send alerts';

    public function handle()
    {
        $lowStockItems = Inventory::where('quantity', '<=', DB::raw('reorder_level'))->get();

        if ($lowStockItems->isNotEmpty()) {
            foreach ($lowStockItems as $item) {
                // Send email alert
                Mail::to('admin@example.com')->send(new LowStockAlert($item));
                $this->info("Low stock alert sent for: {$item->name}");
            }
        } else {
            $this->info('No low stock items found.');
        }
    }
}