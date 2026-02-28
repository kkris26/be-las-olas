<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonial_settings', function (Blueprint $table) {
            $table->id();
            $table->json('testimonial_heading')->nullable();
            $table->json('testimonial_description')->nullable();
            $table->json('testimonial_button_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonial_settings');
    }
};
