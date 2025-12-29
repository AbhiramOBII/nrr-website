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
        Schema::table('sliders', function (Blueprint $table) {
            // Rename existing columns to English versions
            $table->renameColumn('title', 'title_en');
            $table->renameColumn('paragraph', 'paragraph_en');
        });
        
        Schema::table('sliders', function (Blueprint $table) {
            // Add Kannada columns
            $table->string('title_kn')->nullable()->after('title_en');
            $table->text('paragraph_kn')->nullable()->after('paragraph_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            // Remove Kannada columns
            $table->dropColumn(['title_kn', 'paragraph_kn']);
        });
        
        Schema::table('sliders', function (Blueprint $table) {
            // Rename back to original names
            $table->renameColumn('title_en', 'title');
            $table->renameColumn('paragraph_en', 'paragraph');
        });
    }
};
