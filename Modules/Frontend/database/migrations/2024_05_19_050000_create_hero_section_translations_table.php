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
        Schema::create('hero_section_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hero_section_id');
            $table->string('lang_code');
            $table->string('title');
            $table->string('sub_title');
            $table->string('action_button_text')->nullable();
            $table->string('video_button_text')->nullable();
            $table->string('total_student')->nullable();
            $table->string('total_instructor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_section_translations');
    }
};
