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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Category name (e.g., "Banking", "NGO", "Telecom")
            $table->string('slug')->unique(); // URL-friendly version (e.g., "banking", "ngo")
            $table->text('description')->nullable(); // Optional description
            $table->integer('order')->default(0); // For manual sorting
            $table->boolean('is_active')->default(true); // Show/hide category
            $table->timestamps();
            $table->softDeletes(); // Allow soft deletion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
