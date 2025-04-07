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
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Room name or number
        $table->string('type'); // e.g., Consultation, Operation, Recovery
        $table->text('description')->nullable(); // Optional description
        $table->boolean('is_available')->default(true); // Availability status
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
        Schema::dropIfExists('rooms');
    }
};
