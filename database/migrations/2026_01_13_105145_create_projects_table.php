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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Project name
            $table->string('slug')->unique(); // URL slug
            $table->text('description'); // Project description
            $table->string('client_name')->nullable(); // Client who commissioned the project
            $table->integer('year')->nullable(); // Year completed
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete(); // Link to categories

            // Images stored as JSON array using Spatie Media Library
            // But we'll also have a featured image field
            $table->string('featured_image')->nullable();

            // Before/After images for comparison
            $table->string('before_image')->nullable();
            $table->string('after_image')->nullable();

            // Additional details
            $table->text('scope')->nullable(); // Project scope/what was done
            $table->text('technologies')->nullable(); // Technologies used
            $table->boolean('is_featured')->default(false); // Show on homepage
            $table->boolean('is_published')->default(true); // Published or draft
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
        Schema::dropIfExists('projects');
    }
};
