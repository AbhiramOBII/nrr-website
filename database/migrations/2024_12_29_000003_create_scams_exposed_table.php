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
        Schema::create('scams_exposed', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_kn')->nullable();
            $table->string('slug')->unique();
            $table->text('short_description_en');
            $table->text('short_description_kn')->nullable();
            $table->longText('description_en');
            $table->longText('description_kn')->nullable();
            $table->foreignId('featured_media_id')->nullable()->constrained('media')->nullOnDelete();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // Pivot table for multiple media attachments
        Schema::create('scam_exposed_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scam_exposed_id')->constrained('scams_exposed')->cascadeOnDelete();
            $table->foreignId('media_id')->constrained()->cascadeOnDelete();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scam_exposed_media');
        Schema::dropIfExists('scams_exposed');
    }
};
