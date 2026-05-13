<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('category')->nullable();
            $table->string('color')->nullable();
            $table->string('seating')->nullable();
            $table->string('decoration')->nullable();
            $table->string('driver')->nullable();
            $table->string('price_text')->nullable();
            $table->text('price_note')->nullable();
            $table->string('status_label')->default('Available');
            $table->string('status_class')->default('available');
            $table->string('tag_icon')->nullable();
            $table->string('tag_title')->nullable();
            $table->text('summary')->nullable();
            $table->string('description_title')->nullable();
            $table->text('description_one')->nullable();
            $table->text('description_two')->nullable();
            $table->text('image_url')->nullable();
            $table->string('image_alt')->nullable();
            $table->json('gallery_urls')->nullable();
            $table->json('specs')->nullable();
            $table->json('quick_points')->nullable();
            $table->json('features')->nullable();
            $table->json('locations')->nullable();
            $table->json('terms')->nullable();
            $table->string('enquiry_url')->default('booking-enquiry.html');
            $table->string('whatsapp_url')->default('https://wa.me/919999999999');
            $table->boolean('is_active')->default(1);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
