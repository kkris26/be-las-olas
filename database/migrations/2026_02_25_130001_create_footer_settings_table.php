<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();

            // Headings
            $table->json('footer_link_heading')->nullable();
            $table->json('footer_service_heading')->nullable();
            $table->json('footer_location_heading')->nullable();

            // Navigation (repeater — per-locale for translatable title)
            $table->json('footer_services')->nullable();

            // Branding & Legal
            $table->json('footer_left_description')->nullable();
            $table->json('footer_brand_logos')->nullable();    // plain JSON array of images
            $table->json('footer_copyright_text')->nullable(); // contains :year placeholder

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
