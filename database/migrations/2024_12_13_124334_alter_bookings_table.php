<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // drop column check_in, and status
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('check_in');
            $table->dropColumn('status');

            // add column status with types enum
            $table->enum('status', ['confirmed', 'cancelled'])->after('user_id');
            $table->date('booking_date')->after('room_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->date('check_in');
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->dropColumn('status');
            $table->dropColumn('booking_date');
        });
    }
};
