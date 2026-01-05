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
        Schema::table('official_media', function (Blueprint $table) {
            $table->enum('media_type', ['image', 'video', 'youtube', 'instagram', 'facebook', 'twitter'])->default('image')->after('description_kn');
            $table->string('social_link')->nullable()->after('media_type');
            $table->foreignId('media_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('official_media', function (Blueprint $table) {
            $table->dropColumn(['media_type', 'social_link']);
        });
    }
};
