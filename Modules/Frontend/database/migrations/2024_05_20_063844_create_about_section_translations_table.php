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
        Schema::create('about_section_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_section_id');
            $table->string('lang_code');       
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_section_translations');
    }
};
