<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('focus_settings', function (Blueprint $table) {
            $table->id();
            $table->json('focus_heading')->nullable();
            $table->json('focus_description')->nullable();
            $table->json('focus_items')->nullable();         // per-locale repeater array
            $table->string('focus_bg_desktop')->nullable();
            $table->boolean('use_focus_bg_mobile')->default(false);
            $table->string('focus_bg_mobile')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focus_settings');
    }
};
