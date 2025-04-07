<?php

namespace App\Mail;

use App\Models\Inventory;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LowStockAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    public function __construct(Inventory $item)
    {
        $this->item = $item;
    }

    public function build()
    {
        return $this->subject('Low Stock Alert: ' . $this->item->name)
                    ->view('emails.low_stock_alert');
    }
}