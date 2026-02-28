<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('onboarding_posts', function (Blueprint $table) {
            $table->id();

            // Content
            $table->json('title')->nullable();
            $table->json('slug')->nullable();
            $table->json('content')->nullable();
            $table->dateTime('published_at')->nullable();

            // Media
            $table->string('featured_image_desktop')->nullable();
            $table->boolean('use_mobile_image')->default(false);
            $table->string('featured_image_mobile')->nullable();

            // SEO
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->string('seo_keywords')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('onboarding_posts');
    }
};
