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
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. "Parish Priest's Silver Jubilee"
            $table->string('cover_type')->default('photo'); // 'photo' or 'video'
            $table->string('cover_image')->nullable();
            $table->string('cover_video_url')->nullable();
            $table->text('description')->nullable();
            $table->date('event_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_albums');
    }
};
