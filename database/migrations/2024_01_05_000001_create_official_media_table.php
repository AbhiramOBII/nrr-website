<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('official_media', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_kn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_kn')->nullable();
            $table->foreignId('media_id')->constrained('media')->onDelete('cascade');
            $table->date('published_date')->nullable();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('official_media');
    }
};
