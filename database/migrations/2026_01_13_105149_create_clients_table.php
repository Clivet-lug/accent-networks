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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Client name (e.g., "ABSA Bank")
            $table->string('logo'); // Logo file path
            $table->string('website_url')->nullable(); // Client website
            $table->text('description')->nullable(); // Brief about the client
            $table->integer('order')->default(0); // Manual sorting for display
            $table->boolean('is_featured')->default(false); // Featured clients
            $table->boolean('is_active')->default(true); // Show/hide
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
