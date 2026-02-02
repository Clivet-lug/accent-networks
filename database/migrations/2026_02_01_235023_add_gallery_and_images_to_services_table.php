<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->json('gallery_images')->nullable()->after('featured_image');
            $table->string('before_image')->nullable()->after('gallery_images');
            $table->string('after_image')->nullable()->after('before_image');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['gallery_images', 'before_image', 'after_image']);
        });
    }
};
