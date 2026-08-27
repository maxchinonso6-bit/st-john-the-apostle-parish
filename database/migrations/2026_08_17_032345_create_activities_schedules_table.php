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
        Schema::create('activities_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('day'); 
            $table->string('location')->nullable(); 
            $table->string('time');
            $table->text('notes')->nullable(); 
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_schedules');
    }
};
