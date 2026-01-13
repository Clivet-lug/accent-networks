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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();

            // Basic info
            $table->string('title'); // Post title
            $table->string('slug')->unique(); // URL slug
            $table->text('excerpt')->nullable(); // Short summary for listing pages
            $table->longText('content'); // Full post content (rich text/HTML)

            // Featured image
            $table->string('featured_image')->nullable(); // Main post image

            // Categorization
            $table->string('category')->default('General'); // Post category (News, Updates, etc.)
            $table->json('tags')->nullable(); // Array of tags

            // Author & Publishing
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // Author (admin user)
            $table->timestamp('published_at')->nullable(); // Scheduled publishing
            $table->boolean('is_published')->default(false); // Draft or published
            $table->boolean('is_featured')->default(false); // Featured on homepage

            // SEO
            $table->string('meta_title')->nullable(); // SEO title
            $table->text('meta_description')->nullable(); // SEO description

            // Stats
            $table->integer('views')->default(0); // View counter

            $table->timestamps();
            $table->softDeletes();

            // Indexes for performance
            $table->index('published_at');
            $table->index('category');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
