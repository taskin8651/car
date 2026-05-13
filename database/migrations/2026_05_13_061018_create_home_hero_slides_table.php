<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('tag_icon')->nullable();
            $table->string('tag_title');
            $table->string('title');
            $table->string('title_highlight')->nullable();
            $table->text('description');
            $table->text('background_image_url')->nullable();
            $table->text('showcase_image_url')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('badge_icon')->nullable();
            $table->string('badge_title')->nullable();
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_url')->nullable();
            $table->string('primary_button_icon')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();
            $table->string('secondary_button_icon')->nullable();
            $table->json('trust_items')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_hero_slides');
    }
};
