<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'inventory';

    protected $fillable = [
        'name', 'description', 'quantity', 'reorder_level', 'unit_price'
    ];
}