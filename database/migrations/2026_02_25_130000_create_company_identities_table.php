<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_identities', function (Blueprint $table) {
            $table->id();

            // General Info
            $table->string('company_name')->nullable();
            $table->json('tagline')->nullable();

            // Contact Details (repeater — per-locale for translatable label)
            $table->json('contact_items')->nullable();

            // Office Locations (repeater — per-locale for translatable title/address)
            $table->json('location_items')->nullable();

            // Social Media (no translation needed — plain JSON)
            $table->json('social_items')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_identities');
    }
};
