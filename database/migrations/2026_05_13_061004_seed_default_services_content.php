<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('service_intros')->updateOrInsert(
            ['id' => 1],
            [
                'tag_icon' => 'bi bi-info-circle',
                'tag_title' => 'What We Offer',
                'title' => 'Luxury Car Services Designed For Grand Celebrations',
                'description' => 'From royal wedding entries to VIP guest pickup, our services are planned to make your event smooth, stylish and memorable. Choose the right car, share your event details and our team will help with availability, pricing and service coordination.',
                'pills' => json_encode([
                    'Driver Included',
                    'Decoration Available',
                    'Wedding/Event Ready',
                    'Quick Enquiry Support',
                ]),
                'status' => 1,
                'sort_order' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        DB::table('service_highlights')->updateOrInsert(
            ['id' => 1],
            [
                'tag_icon' => 'bi bi-shield-check',
                'tag_title' => 'Why Our Services',
                'image_alt' => 'Decorated wedding car service',
                'badge_icon' => 'bi bi-gem',
                'badge_title' => 'Premium Wedding Entry',
                'title' => 'Planned For Comfort, Timing & Premium Event Experience',
                'description' => 'Our team coordinates with customers based on event date, location, preferred car, decoration needs and pickup/drop requirements to make the experience smooth and professional.',
                'features' => json_encode([
                    'Clean and event-ready cars',
                    'Professional driver support',
                    'Wedding decoration on request',
                    'WhatsApp and call enquiry support',
                ]),
                'status' => 1,
                'sort_order' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        $cards = [
            ['bi bi-stars', 'Luxury Car For Groom Entry', 'Royal luxury car service for groom entry and grand wedding arrival.'],
            ['bi bi-car-front-fill', 'Wedding Car Rental', 'Premium cars for marriage functions, wedding venues and celebrations.'],
            ['bi bi-heart', 'Bridal Entry Car', 'Elegant decorated car service for bridal entry and premium moments.'],
            ['bi bi-flower1', 'Reception Car Rental', 'Stylish luxury cars for reception arrival and guest impressions.'],
            ['bi bi-calendar-heart', 'Engagement Car Rental', 'Luxury cars for engagement ceremonies, ring events and family functions.'],
            ['bi bi-camera', 'Pre-Wedding Shoot Car', 'Premium cars for cinematic couple shoots and luxury photoshoot concepts.'],
            ['bi bi-person-check', 'VIP Guest Pickup & Drop', 'Comfortable luxury transport for important guests, family and VIP movement.'],
            ['bi bi-briefcase', 'Corporate & Event Luxury Car', 'Premium cars for corporate events, launches, meetings and private occasions.'],
        ];

        foreach ($cards as $index => [$icon, $title, $description]) {
            DB::table('service_cards')->updateOrInsert(
                ['id' => $index + 1],
                [
                    'icon' => $icon,
                    'title' => $title,
                    'description' => $description,
                    'button_text' => 'Enquire Now',
                    'button_url' => 'booking-enquiry.html',
                    'status' => 1,
                    'sort_order' => $index + 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    public function down(): void
    {
        DB::table('service_cards')->whereBetween('id', [1, 8])->delete();
        DB::table('service_highlights')->where('id', 1)->delete();
        DB::table('service_intros')->where('id', 1)->delete();
    }
};
