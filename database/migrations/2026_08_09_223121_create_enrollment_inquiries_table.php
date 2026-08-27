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
    Schema::create('enrollment_inquiries', function (Blueprint $table) {
        $table->id();
        $table->string('guardian_name');
        $table->string('phone');
        $table->string('email')->nullable();
        $table->string('child_class')->nullable(); // intended class/level
        $table->text('message')->nullable();
        $table->string('status')->default('new'); // new, contacted, resolved
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_inquiries');
    }
};
