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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
            $table->dropColumn('password');
            
            // add column phone
            $table->string('phone')->unique();
            $table->string('otp_code')->nullable();

            $table->timestamp('phone_verified_at')->nullable();
            $table->rememberToken();

            // alter name become nullabe
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('password');
            
            // drop column phone
            $table->dropColumn('phone');
            $table->dropColumn('otp_code');
            $table->dropColumn('phone_verified_at');

            // alter name become not nullabe
            $table->string('name')->nullable(false)->change();
        });
    }
};
