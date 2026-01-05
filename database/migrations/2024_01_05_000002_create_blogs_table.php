<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_kn')->nullable();
            $table->string('slug')->unique();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_kn')->nullable();
            $table->longText('content_en');
            $table->longText('content_kn')->nullable();
            $table->foreignId('featured_media_id')->nullable()->constrained('media')->onDelete('set null');
            $table->string('author')->nullable();
            $table->date('published_date')->nullable();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
