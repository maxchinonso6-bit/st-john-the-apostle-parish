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
    Schema::create('parish_council_executives', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('position');
        $table->string('photo')->nullable();
        $table->text('bio')->nullable();
        $table->string('phone')->nullable();
        $table->string('status')->default('active');
        $table->year('start_year')->nullable();
        $table->year('end_year')->nullable();
        $table->integer('order')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parish_council_executives');
    }
};
