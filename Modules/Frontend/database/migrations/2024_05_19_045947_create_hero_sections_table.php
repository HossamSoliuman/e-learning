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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->text('action_button_url')->nullable();
            $table->text('video_button_url')->nullable(); 
            $table->string('banner_image')->nullable(); 
            $table->string('banner_background')->nullable(); 
            $table->string('hero_background')->nullable(); 
            $table->string('h_two_banner_image')->nullable(); 
            $table->string('h_two_banner_background')->nullable(); 
            $table->string('h_two_hero_background')->nullable(); 
            $table->string('enroll_students_image')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
