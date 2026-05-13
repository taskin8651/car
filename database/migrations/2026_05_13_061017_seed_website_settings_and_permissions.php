<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('website_settings')->updateOrInsert(
            ['id' => 1],
            [
                'site_name' => 'CarBookKro',
                'tagline' => 'Luxury Wedding Cars',
                'phone' => '+91 99999 99999',
                'whatsapp_number' => '+91 99999 99999',
                'whatsapp_url' => 'https://wa.me/919999999999',
                'email' => 'info@carbookkro.com',
                'business_address' => 'Your Business Address, India',
                'google_map_embed_url' => 'https://www.google.com/maps?q=India&output=embed',
                'opening_hours' => 'Mon - Sun: 9:00 AM - 9:00 PM',
                'facebook_url' => '#',
                'instagram_url' => '#',
                'youtube_url' => '#',
                'privacy_policy_url' => '#',
                'terms_url' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        foreach ([
            ['id' => 39, 'title' => 'contact_enquiry_access'],
            ['id' => 40, 'title' => 'website_setting_access'],
        ] as $permission) {
            DB::table('permissions')->updateOrInsert(
                ['id' => $permission['id']],
                ['title' => $permission['title']]
            );

            DB::table('permission_role')->insertOrIgnore([
                'permission_id' => $permission['id'],
                'role_id' => 1,
            ]);
        }
    }

    public function down(): void
    {
        DB::table('permission_role')->whereIn('permission_id', [39, 40])->delete();
        DB::table('permissions')->whereIn('id', [39, 40])->delete();
        DB::table('website_settings')->where('id', 1)->delete();
    }
};
