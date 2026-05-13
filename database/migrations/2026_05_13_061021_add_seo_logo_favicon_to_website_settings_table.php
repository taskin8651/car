<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('tagline');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->text('meta_keywords')->nullable()->after('meta_description');
            $table->text('logo_url')->nullable()->after('terms_url');
            $table->text('favicon_url')->nullable()->after('logo_url');
        });

        DB::table('website_settings')->where('id', 1)->update([
            'meta_title' => 'CarBookKro | Premium Luxury Wedding Car Rental Service',
            'meta_description' => 'Book luxury wedding cars for groom entry, bridal entry, reception, engagement and premium events.',
            'meta_keywords' => 'luxury wedding car rental, groom entry car, bridal entry car, premium car rental',
        ]);
    }

    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keywords',
                'logo_url',
                'favicon_url',
            ]);
        });
    }
};
