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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Service name (e.g., "3CX Phone Systems")
            $table->string('slug')->unique(); // URL slug
            $table->text('short_description')->nullable(); // Brief description for cards
            $table->longText('description'); // Full description

            // Content sections stored as JSON
            // e.g., ["features": [...], "benefits": [...], "use_cases": [...]]
            $table->json('content_sections')->nullable();

            $table->string('icon')->nullable(); // Icon class or image path
            $table->string('featured_image')->nullable(); // Main service image

            // CTA (Call to Action)
            $table->string('cta_text')->default('Get a Quote'); // Button text
            $table->string('cta_link')->default('/contact'); // Button link

            $table->boolean('is_active')->default(true); // Show/hide service
            $table->integer('order')->default(0); // Manual sorting

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
