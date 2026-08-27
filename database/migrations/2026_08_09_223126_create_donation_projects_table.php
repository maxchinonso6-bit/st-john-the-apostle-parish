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
    Schema::create('donation_projects', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Church Building Fund, School Building Fund, etc.
        $table->text('description')->nullable();
        $table->string('photo')->nullable();
        $table->decimal('target_amount', 12, 2)->nullable();
        $table->decimal('amount_raised', 12, 2)->default(0);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_projects');
    }
};
