<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('inventory', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Name of the item (e.g., Bandages, Syringes)
        $table->text('description')->nullable(); // Optional description
        $table->integer('quantity')->default(0); // Current stock quantity
        $table->integer('reorder_level')->default(10); // Reorder threshold
        $table->decimal('unit_price', 8, 2)->default(0.00); // Price per unit
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
};
