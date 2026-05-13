<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        $cars = [
            [
                'name' => 'BMW 5 Series',
                'brand' => 'BMW',
                'model' => '5 Series',
                'category' => 'Luxury Sedan',
                'color' => 'White / Black',
                'seating' => '4+1 Seats',
                'decoration' => 'Available',
                'driver' => 'Included',
                'price_text' => '₹9,999+',
                'status_label' => 'Available',
                'status_class' => 'available',
                'image_url' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=900&q=80',
                'gallery_urls' => [
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=1300&q=80',
                    'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1800&q=80',
                    'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=700&q=80',
                ],
                'summary' => 'Perfect luxury sedan for groom entry, reception and premium city events.',
                'quick_points' => ['4+1 Seating', 'Decoration Available', 'Driver Included', 'Local Booking'],
                'features' => ['Groom entry ready', 'Bridal arrival suitable', 'Premium event travel', 'Photoshoot friendly look'],
            ],
            [
                'name' => 'Mercedes Benz',
                'brand' => 'Mercedes',
                'model' => 'Benz',
                'category' => 'Premium SUV',
                'color' => 'White / Black',
                'seating' => '4+1 Seats',
                'decoration' => 'Available',
                'driver' => 'Included',
                'price_text' => 'On Enquiry',
                'status_label' => 'Available',
                'status_class' => 'available',
                'image_url' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=900&q=80',
                'summary' => 'Premium comfort car for wedding events, guest travel and VIP movement.',
                'quick_points' => ['4+1 Seating', 'Luxury Class', 'Local Booking', 'Event Ready'],
                'features' => ['Premium guest pickup', 'Wedding event ready', 'VIP movement suitable', 'Driver included'],
            ],
            [
                'name' => 'Premium Sports Car',
                'brand' => 'Premium',
                'model' => 'Sports Car',
                'category' => 'Sports Car',
                'color' => 'Red / Black',
                'seating' => '2 Seats',
                'decoration' => 'On Request',
                'driver' => 'Included',
                'price_text' => 'On Enquiry',
                'status_label' => 'On Enquiry',
                'status_class' => 'enquiry',
                'image_url' => 'https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?auto=format&fit=crop&w=900&q=80',
                'summary' => 'A bold choice for grand groom entry, photoshoots and premium events.',
                'quick_points' => ['Photoshoot Ready', 'Grand Entry', 'Luxury Experience', 'Driver Included'],
                'features' => ['Photoshoot ready', 'Grand entry look', 'Premium event travel', 'Bold luxury presence'],
            ],
            [
                'name' => 'Audi A6',
                'brand' => 'Audi',
                'model' => 'A6',
                'category' => 'Luxury Sedan',
                'color' => 'White / Black',
                'seating' => '4+1 Seats',
                'decoration' => 'Available',
                'driver' => 'Included',
                'price_text' => '₹11,999+',
                'status_label' => 'Available',
                'status_class' => 'available',
                'image_url' => 'https://images.unsplash.com/photo-1503736334956-4c8f8e92946d?auto=format&fit=crop&w=900&q=80',
                'summary' => 'Elegant sedan suitable for wedding arrival, reception and VIP guest pickup.',
                'quick_points' => ['4+1 Seating', 'Decor Support', 'Timely Pickup', 'Wedding Ready'],
                'features' => ['Reception arrival ready', 'VIP pickup suitable', 'Premium sedan comfort', 'Decor support available'],
            ],
            [
                'name' => 'Convertible Luxury Car',
                'brand' => 'Convertible',
                'model' => 'Luxury Car',
                'category' => 'Convertible',
                'color' => 'Red / White',
                'seating' => '2 Seats',
                'decoration' => 'On Request',
                'driver' => 'Included',
                'price_text' => 'On Enquiry',
                'status_label' => 'On Enquiry',
                'status_class' => 'enquiry',
                'image_url' => 'https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=900&q=80',
                'summary' => 'Stylish open-top experience for premium couple shoots and royal entries.',
                'quick_points' => ['Photoshoot', 'Premium Entry', 'Event Ready', 'Luxury Look'],
                'features' => ['Open-top premium look', 'Couple shoot friendly', 'Royal entry suitable', 'Event ready styling'],
            ],
            [
                'name' => 'Vintage Wedding Car',
                'brand' => 'Vintage',
                'model' => 'Wedding Car',
                'category' => 'Vintage Car',
                'color' => 'White / Classic',
                'seating' => '4+1 Seats',
                'decoration' => 'Available',
                'driver' => 'Included',
                'price_text' => 'On Enquiry',
                'status_label' => 'Available',
                'status_class' => 'available',
                'image_url' => 'https://images.unsplash.com/photo-1549927681-0b673b8243ab?auto=format&fit=crop&w=900&q=80',
                'summary' => 'Classic wedding entry car for royal-themed weddings and memorable photos.',
                'quick_points' => ['Decor Available', 'Wedding Special', 'Photo Friendly', 'Driver Included'],
                'features' => ['Royal-themed entry', 'Classic wedding look', 'Photo friendly design', 'Decoration available'],
            ],
        ];

        foreach ($cars as $index => $car) {
            $specs = [
                'Brand' => $car['brand'],
                'Model' => $car['model'],
                'Category' => $car['category'],
                'Color' => $car['color'],
                'Seating' => $car['seating'],
                'Decoration' => $car['decoration'],
                'Driver' => $car['driver'],
                'Price' => $car['price_text'],
            ];

            DB::table('cars')->updateOrInsert(
                ['slug' => Str::slug($car['name'])],
                [
                    'name' => $car['name'],
                    'slug' => Str::slug($car['name']),
                    'brand' => $car['brand'],
                    'model' => $car['model'],
                    'category' => $car['category'],
                    'color' => $car['color'],
                    'seating' => $car['seating'],
                    'decoration' => $car['decoration'],
                    'driver' => $car['driver'],
                    'price_text' => $car['price_text'],
                    'price_note' => 'Final price depends on location, date, duration and decoration.',
                    'status_label' => $car['status_label'],
                    'status_class' => $car['status_class'],
                    'tag_icon' => 'bi bi-gem',
                    'tag_title' => 'Wedding Ready Luxury Car',
                    'summary' => $car['summary'],
                    'description_title' => 'Perfect Luxury Car For Wedding & Premium Events',
                    'description_one' => $car['name'] . ' is ideal for customers looking for a clean, stylish and premium car for wedding functions, groom entry, reception arrival, engagement events, photoshoots and VIP pickup or drop requirements.',
                    'description_two' => 'The car can be booked with professional driver support and decoration options as per event requirement. Availability depends on date, location, route and event timing.',
                    'image_url' => $car['image_url'],
                    'image_alt' => $car['name'] . ' luxury wedding car',
                    'gallery_urls' => json_encode($car['gallery_urls'] ?? [$car['image_url']]),
                    'specs' => json_encode($specs),
                    'quick_points' => json_encode($car['quick_points']),
                    'features' => json_encode($car['features']),
                    'locations' => json_encode(['Wedding Venues', 'Banquet Halls', 'Hotels & Resorts', 'Local Pickup', 'VIP Drop']),
                    'terms' => json_encode([
                        'Booking depends on car availability for selected date.',
                        'Final price may vary by location, route and duration.',
                        'Decoration charges may be extra as per requirement.',
                        'Customer must share correct event timing and pickup location.',
                    ]),
                    'enquiry_url' => 'booking-enquiry.html',
                    'whatsapp_url' => 'https://wa.me/919999999999',
                    'is_active' => 1,
                    'sort_order' => $index + 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }

    public function down(): void
    {
        DB::table('cars')->whereIn('slug', [
            'bmw-5-series',
            'mercedes-benz',
            'premium-sports-car',
            'audi-a6',
            'convertible-luxury-car',
            'vintage-wedding-car',
        ])->delete();
    }
};
