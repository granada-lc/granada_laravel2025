<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    /**
     * Migration to add email verification fields to the 'usersinfo' table, 
     * including a timestamp for email verification and a token for 
     * verification purposes, with the ability to reverse the changes.
     */
    public function up(): void
    {
        //
        Schema::table('usersinfo', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_token')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::table('usersinfo', function (Blueprint $table) {
            $table->dropColumn(['email_verified_at', 'verification_token']);
        });
    }
};