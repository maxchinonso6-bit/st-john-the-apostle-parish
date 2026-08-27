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
    Schema::create('zone_executives', function (Blueprint $table) {
        $table->id();
        $table->foreignId('zone_id')->constrained()->cascadeOnDelete();
        $table->string('name');
        $table->string('position');
        $table->string('phone')->nullable();
        $table->string('status')->default('active');
        $table->year('start_year')->nullable();
        $table->year('end_year')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zone_executives');
    }
};
