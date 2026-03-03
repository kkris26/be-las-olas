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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->json('hero_subheading')->nullable();
            $table->json('hero_heading')->nullable();
            $table->json('hero_description')->nullable();
            $table->json('hero_button_text')->nullable();
            $table->string('hero_button_link')->nullable();
            $table->string('hero_desktop_bg_image')->nullable();
            $table->boolean('hero_use_mobile_image')->default(false);
            $table->string('hero_mobile_bg_image')->nullable();

            // Highlight
            $table->json('highlight_subheading')->nullable();
            $table->json('highlight_heading')->nullable();
            $table->json('highlight_description')->nullable();
            $table->json('highlight_button_text')->nullable();
            $table->string('highlight_button_link')->nullable(); // Ensure this column is here if needed or keep existing logical order
            $table->string('highlight_image')->nullable();

            // Statistics (Repeater)

            // Statistics (Repeater)
            $table->json('statistics_items')->nullable();

            // Cruise Services
            $table->json('cruise_subheading')->nullable();
            $table->json('cruise_heading')->nullable();
            $table->json('cruise_short_description')->nullable();

            // Land Services
            $table->json('land_subheading')->nullable();
            $table->json('land_heading')->nullable();
            $table->json('land_short_description')->nullable();

            // News Section
            $table->json('news_subheading')->nullable();
            $table->json('news_heading')->nullable();
            $table->json('news_short_description')->nullable();
            $table->json('news_button_text')->nullable();
            $table->string('news_button_link')->nullable();

            // SEO
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->string('seo_og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
