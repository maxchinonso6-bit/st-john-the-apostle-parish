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
        Schema::table('mass_bookings', function (Blueprint $table) {
            $table->dropColumn('payment_reference');
            $table->string('proof_of_payment')->nullable()->after('amount');
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('payment_reference');
            $table->string('proof_of_payment')->nullable()->after('amount');
        });
    }

    public function down(): void
    {
        Schema::table('mass_bookings', function (Blueprint $table) {
            $table->dropColumn('proof_of_payment');
            $table->string('payment_reference')->nullable();
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('proof_of_payment');
            $table->string('payment_reference')->nullable();
        });
    }
};
