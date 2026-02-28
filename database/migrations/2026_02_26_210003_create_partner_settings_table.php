<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_settings', function (Blueprint $table) {
            $table->id();
            $table->json('partner_heading')->nullable();
            $table->json('partner_description')->nullable();
            $table->json('partner_logos')->nullable();       // JSON array of {logo_image}
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_settings');
    }
};
