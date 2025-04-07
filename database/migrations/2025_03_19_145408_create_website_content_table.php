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
    Schema::create('website_content', function (Blueprint $table) {
        $table->id();
        $table->string('key')->unique(); // e.g., welcome_text, about_us
        $table->text('value')->nullable(); // Content (text or image URL)
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
        Schema::dropIfExists('website_content');
    }
};
