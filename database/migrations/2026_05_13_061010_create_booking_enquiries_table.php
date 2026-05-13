<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->string('event_type');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('pickup_location');
            $table->string('drop_location')->nullable();
            $table->string('preferred_car');
            $table->string('decoration_required');
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_enquiries');
    }
};
