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
    Schema::create('mass_bookings', function (Blueprint $table) {
        $table->id();
        $table->string('booker_name');
        $table->string('phone');
        $table->string('email')->nullable();
        $table->string('intention_type'); // thanksgiving, sick, RIP, birthday, etc.
        $table->text('intention_text')->nullable();
        $table->date('mass_date');
        $table->decimal('amount', 10, 2)->default(0);
        $table->string('payment_status')->default('pending'); // pending, paid, failed
        $table->string('payment_reference')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mass_bookings');
    }
};
