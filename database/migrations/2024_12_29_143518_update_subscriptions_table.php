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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'expiry_date', 'status']); // Remove old fields
            $table->enum('type', ['monthly', 'yearly'])->default('monthly'); // Add type column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->date('start_date');
            $table->date('expiry_date');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->dropColumn('type');
        });
    }
};
