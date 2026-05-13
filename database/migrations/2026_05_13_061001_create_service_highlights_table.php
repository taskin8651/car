<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_highlights', function (Blueprint $table) {
            $table->id();
            $table->string('tag_icon')->nullable();
            $table->string('tag_title')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('badge_icon')->nullable();
            $table->string('badge_title')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_highlights');
    }
};
