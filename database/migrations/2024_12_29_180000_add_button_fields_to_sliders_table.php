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
            $table->string('button_text_en')->nullable()->after('paragraph_kn');
            $table->string('button_text_kn')->nullable()->after('button_text_en');
            $table->string('button_link_type')->nullable()->after('button_text_kn');
            $table->unsignedBigInteger('button_link_id')->nullable()->after('button_link_type');
            $table->string('button_link_url')->nullable()->after('button_link_id');
            $table->foreignId('media_id')->nullable()->after('image')->constrained('media')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropForeign(['media_id']);
            $table->dropColumn([
                'button_text_en',
                'button_text_kn',
                'button_link_type',
                'button_link_id',
                'button_link_url',
                'media_id'
            ]);
        });
    }
};
