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
    Schema::create('zones', function (Blueprint $table) {
        $table->id();
        $table->foreignId('station_id')->constrained()->cascadeOnDelete();
        $table->string('name'); // St Paul's, St Jude's, St Francis', St Jane's
        $table->text('description')->nullable();
        $table->string('meeting_day')->nullable();
        $table->string('meeting_time')->nullable();
        $table->string('meeting_venue')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};
