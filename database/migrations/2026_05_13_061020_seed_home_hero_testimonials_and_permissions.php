<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('permissions')->updateOrInsert(['id' => 41], ['title' => 'home_hero_slide_access']);
        DB::table('permissions')->updateOrInsert(['id' => 42], ['title' => 'testimonial_access']);

        DB::table('permission_role')->insertOrIgnore([
            ['permission_id' => 41, 'role_id' => 1],
            ['permission_id' => 42, 'role_id' => 1],
        ]);

        if (DB::table('home_hero_slides')->count() === 0) {
            DB::table('home_hero_slides')->insert([
                [
                    'tag_icon' => 'bi bi-stars',
                    'tag_title' => 'Luxury Wedding Car Rental',
                    'title' => 'Make Your Wedding Entry',
                    'title_highlight' => 'Royal & Unforgettable',
                    'description' => 'Premium luxury cars for groom entry, bridal entry, reception, engagement, pre-wedding shoots and VIP events.',
                    'background_image_url' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1800&q=80',
                    'showcase_image_url' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1200&q=80',
                    'image_alt' => 'Luxury wedding car',
                    'badge_icon' => 'bi bi-gem',
                    'badge_title' => 'Premium Fleet',
                    'primary_button_text' => 'Book Luxury Car',
                    'primary_button_url' => '/booking-enquiry',
                    'primary_button_icon' => 'bi bi-arrow-right',
                    'secondary_button_text' => 'View Cars',
                    'secondary_button_url' => '/cars',
                    'secondary_button_icon' => 'bi bi-car-front',
                    'trust_items' => json_encode([
                        ['number' => '50+', 'label' => 'Premium Cars'],
                        ['number' => '500+', 'label' => 'Happy Events'],
                        ['number' => '24/7', 'label' => 'Booking Support'],
                    ]),
                    'status' => 1,
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'tag_icon' => 'bi bi-gem',
                    'tag_title' => 'Premium Cars For Premium Moments',
                    'title' => 'Arrive In Style With Our',
                    'title_highlight' => 'Luxury Fleet',
                    'description' => 'Choose from luxury sedans, SUVs, vintage cars, sports cars, convertibles and premium wedding entry cars.',
                    'background_image_url' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=1800&q=80',
                    'showcase_image_url' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=1200&q=80',
                    'image_alt' => 'Premium luxury car',
                    'badge_icon' => 'bi bi-stars',
                    'badge_title' => 'Luxury Class',
                    'primary_button_text' => 'Explore Fleet',
                    'primary_button_url' => '/cars',
                    'primary_button_icon' => 'bi bi-arrow-right',
                    'secondary_button_text' => 'Call Availability',
                    'secondary_button_url' => 'tel:+919999999999',
                    'secondary_button_icon' => 'bi bi-telephone',
                    'trust_items' => json_encode([
                        ['number' => 'Sedan', 'label' => 'Luxury Class'],
                        ['number' => 'SUV', 'label' => 'Premium Comfort'],
                        ['number' => 'Sport', 'label' => 'Grand Entry'],
                    ]),
                    'status' => 1,
                    'sort_order' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'tag_icon' => 'bi bi-calendar-heart',
                    'tag_title' => 'Wedding & Event Specialist',
                    'title' => 'Luxury Cars For Every',
                    'title_highlight' => 'Special Occasion',
                    'description' => 'Wedding, reception, engagement, photoshoot, VIP pickup, corporate event and premium personal celebrations.',
                    'background_image_url' => 'https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=1800&q=80',
                    'showcase_image_url' => 'https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=1200&q=80',
                    'image_alt' => 'Luxury event car',
                    'badge_icon' => 'bi bi-camera',
                    'badge_title' => 'Event Ready',
                    'primary_button_text' => 'Enquire Now',
                    'primary_button_url' => '/booking-enquiry',
                    'primary_button_icon' => 'bi bi-arrow-right',
                    'secondary_button_text' => 'WhatsApp Us',
                    'secondary_button_url' => 'https://wa.me/919999999999',
                    'secondary_button_icon' => 'bi bi-whatsapp',
                    'trust_items' => json_encode([
                        ['number' => 'Wedding', 'label' => 'Grand Entry'],
                        ['number' => 'Shoot', 'label' => 'Pre-Wedding'],
                        ['number' => 'VIP', 'label' => 'Pickup Drop'],
                    ]),
                    'status' => 1,
                    'sort_order' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        if (DB::table('testimonials')->count() === 0) {
            DB::table('testimonials')->insert([
                [
                    'client_name' => 'Rahul Sharma',
                    'event_type' => 'Wedding Event',
                    'message' => 'The car was clean, decorated beautifully and arrived on time. Perfect service for my wedding entry.',
                    'rating' => 5,
                    'avatar_text' => 'R',
                    'status' => 1,
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'client_name' => 'Ankit Verma',
                    'event_type' => 'Reception Event',
                    'message' => 'Very premium experience. Booking was easy and the team helped us choose the right car.',
                    'rating' => 5,
                    'avatar_text' => 'A',
                    'status' => 1,
                    'sort_order' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'client_name' => 'Priya Singh',
                    'event_type' => 'Pre-Wedding Shoot',
                    'message' => 'Best luxury car rental experience for our pre-wedding shoot. Highly recommended.',
                    'rating' => 5,
                    'avatar_text' => 'P',
                    'status' => 1,
                    'sort_order' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }

    public function down(): void
    {
        DB::table('permission_role')->whereIn('permission_id', [41, 42])->delete();
        DB::table('permissions')->whereIn('id', [41, 42])->delete();
    }
};
