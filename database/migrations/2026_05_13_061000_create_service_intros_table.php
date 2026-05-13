<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_intros', function (Blueprint $table) {
            $table->id();
            $table->string('tag_icon')->nullable();
            $table->string('tag_title')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('pills')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_intros');
    }
};
