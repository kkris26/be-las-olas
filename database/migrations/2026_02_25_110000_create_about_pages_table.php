<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            // Banner
            $table->json('banner_title')->nullable();
            $table->string('banner_image')->nullable();

            // Owner Message
            $table->json('owner_headline')->nullable();
            $table->json('owner_message')->nullable();   // WYSIWYG
            $table->json('owner_name')->nullable();
            $table->json('owner_position')->nullable();
            $table->string('owner_image')->nullable();

            // About Company
            $table->json('about_headline')->nullable();
            $table->json('about_description')->nullable(); // WYSIWYG

            // Company Values
            $table->json('value_subheading')->nullable();
            $table->json('value_heading')->nullable();
            $table->json('value_description')->nullable();
            $table->string('value_image')->nullable();
            $table->json('value_items')->nullable();       // Repeater (per-locale Spatie)

            // Collaboration
            $table->json('collaboration_heading')->nullable();
            $table->json('collaboration_description')->nullable();
            $table->string('collaboration_image')->nullable();
            $table->string('collaboration_video_link')->nullable();
            $table->string('collaboration_video_target_url')->nullable();

            // Certified / Partners
            $table->json('certified_heading')->nullable();
            $table->json('certified_description')->nullable();
            $table->json('certified_logos')->nullable();   // Repeater (image-only, no translation)
            $table->string('certified_image')->nullable();

            // Team
            $table->json('team_heading')->nullable();
            $table->json('team_description')->nullable();

            // SEO
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->string('seo_og_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
