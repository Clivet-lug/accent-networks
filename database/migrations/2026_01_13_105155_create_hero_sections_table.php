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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();

            // Page identification
            $table->string('page')->unique(); // e.g., 'home', 'about', 'services', 'contact'

            // Content
            $table->string('headline'); // Main headline text
            $table->text('subheadline')->nullable(); // Subheading/description
            $table->string('background_image'); // Hero background image

            // Optional video background
            $table->string('background_video')->nullable(); // Video URL/path
            $table->boolean('use_video')->default(false); // Use video instead of image

            // CTA Button
            $table->string('cta_text')->nullable(); // Button text (e.g., "Get Started")
            $table->string('cta_link')->nullable(); // Button link
            $table->boolean('show_cta')->default(true); // Show/hide button

            // Styling options
            $table->enum('text_alignment', ['left', 'center', 'right'])->default('center');
            $table->enum('text_color', ['light', 'dark'])->default('light'); // For contrast
            $table->string('overlay_color')->default('rgba(0,62,126,0.5)'); // Blue overlay with opacity

            // Status
            $table->boolean('is_active')->default(true); // Enable/disable hero section

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
