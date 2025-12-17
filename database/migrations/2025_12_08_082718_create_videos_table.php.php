<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('youtube_id');
            $table->string('thumbnail_url')->nullable();

            // foreign key ke categories
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->onDelete('cascade');

            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
