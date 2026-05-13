<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_specialization_cards', function (Blueprint $table) {
            $table->id();

            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_alt')->nullable();

            $table->boolean('status')->default(1);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_specialization_cards');
    }
};