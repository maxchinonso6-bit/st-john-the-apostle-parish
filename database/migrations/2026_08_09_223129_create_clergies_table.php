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
    Schema::create('clergy', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('role'); // Parish Priest, Assistant Priest, Indigenous Priest, Religious
        $table->string('status')->default('past'); // active or past
        $table->year('start_year');
        $table->year('end_year')->nullable();
        $table->string('photo')->nullable();
        $table->text('bio')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clergies');
    }
};
