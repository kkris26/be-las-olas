<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_settings', function (Blueprint $table) {
            $table->id();

            // Banner
            $table->string('banner_image')->nullable();
            $table->json('banner_title')->nullable();

            // Page Header
            $table->json('subheading')->nullable();
            $table->json('heading')->nullable();
            $table->json('short_description')->nullable();

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
        Schema::dropIfExists('article_settings');
    }
};
