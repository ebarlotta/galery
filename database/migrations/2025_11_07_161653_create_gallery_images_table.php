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
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('filename'); // - string
            $table->string('original_name'); // - string
            $table->string('file_path'); // - string
            $table->boolean('is_active'); // - boolean (default: true)
            // uploaded_by - string (opcional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
