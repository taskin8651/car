<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        $items = [
            ['Premium Wedding Fleet', 'Luxury Cars', 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=900&q=80', 'Luxury car gallery', ''],
            ['Wedding Ready Car', 'Decorated Cars', 'https://images.unsplash.com/photo-1549927681-0b673b8243ab?auto=format&fit=crop&w=900&q=80', 'Decorated wedding car', 'tall'],
            ['Premium Event Car', 'Luxury Cars', 'https://images.unsplash.com/photo-1503736334956-4c8f8e92946d?auto=format&fit=crop&w=900&q=80', 'Premium sports car', ''],
            ['Royal Arrival', 'Wedding Entry', 'https://images.unsplash.com/photo-1511919884226-fd3cad34687c?auto=format&fit=crop&w=900&q=80', 'Wedding entry car', 'small'],
            ['Grand Entry', 'Event Photos', 'https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?auto=format&fit=crop&w=900&q=80', 'Sports car event', 'small'],
            ['Photoshoot Moment', 'Customer Moments', 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=900&q=80', 'Luxury car photoshoot', 'small'],
            ['Luxury Collection', 'Premium Fleet', 'https://images.unsplash.com/photo-1555353540-64580b51c258?auto=format&fit=crop&w=900&q=80', 'Premium car rental', 'small'],
        ];

        foreach ($items as $index => [$title, $category, $imageUrl, $imageAlt, $cardSize]) {
            DB::table('gallery_items')->updateOrInsert(
                ['title' => $title],
                [
                    'category' => $category,
                    'image_url' => $imageUrl,
                    'image_alt' => $imageAlt,
                    'card_size' => $cardSize,
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
        DB::table('gallery_items')->whereIn('title', [
            'Premium Wedding Fleet',
            'Wedding Ready Car',
            'Premium Event Car',
            'Royal Arrival',
            'Grand Entry',
            'Photoshoot Moment',
            'Luxury Collection',
        ])->delete();
    }
};
