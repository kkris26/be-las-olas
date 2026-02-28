<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();

            // Core fields (translatable)
            $table->json('title')->nullable();
            $table->json('slug')->nullable();
            $table->json('content')->nullable();

            // Metadata (translatable)
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('seo_keywords')->nullable();

            // Publishing
            $table->dateTime('published_at')->nullable();

            // Images
            $table->string('featured_image_desktop')->nullable();
            $table->boolean('use_mobile_image')->default(false);
            $table->string('featured_image_mobile')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_posts');
    }
};
