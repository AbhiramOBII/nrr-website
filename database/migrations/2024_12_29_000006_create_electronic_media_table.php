<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('electronic_media', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_kn')->nullable();
            $table->string('slug')->unique();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_kn')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_kn')->nullable();
            $table->string('youtube_url');
            $table->string('youtube_video_id')->nullable();
            $table->foreignId('thumbnail_media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('electronic_media');
    }
};
