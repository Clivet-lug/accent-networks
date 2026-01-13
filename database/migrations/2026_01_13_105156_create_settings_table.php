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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Key-value pair system
            $table->string('key')->unique(); // Setting identifier (e.g., 'company_phone')
            $table->text('value')->nullable(); // Setting value
            $table->string('type')->default('text'); // Data type: text, textarea, image, boolean, json
            $table->string('group')->default('general'); // Group settings (e.g., 'contact', 'social', 'general')
            $table->text('description')->nullable(); // Help text for admin

            $table->timestamps();

            // Index for faster lookups
            $table->index('key');
            $table->index('group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
