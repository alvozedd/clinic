<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
=======
    /**
     * Run the migrations.
     *
     * @return void
     */
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['patient', 'secretary', 'doctor', 'admin'])->default('patient');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('is_active')->default(true);
=======
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
            $table->rememberToken();
            $table->timestamps();
        });
    }

<<<<<<< HEAD
=======
    /**
     * Reverse the migrations.
     *
     * @return void
     */
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
    public function down()
    {
        Schema::dropIfExists('users');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> e66ccc31aa6edaf7f25687c5fddb1dbe3f6d6cb8
