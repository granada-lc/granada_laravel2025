<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  // Method to create the 'password_resets' table.

    {
        Schema::create('password_resets', function (Blueprint $table) {  // Creates the 'password_resets' table.
            $table->string('email')->index();   // Adds an indexed 'email' column for user identification.
            $table->string('token'); // Adds a 'token' column for password reset tokens.
            $table->timestamp('created_at')->nullable(); // Adds a nullable 'created_at' timestamp for record creation time.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_resets');   // Drops the 'password_resets' table if it exists.
    }
};