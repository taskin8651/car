<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'epaper_create',
            ],
            [
                'id'    => 20,
                'title' => 'epaper_edit',
            ],
            [
                'id'    => 21,
                'title' => 'epaper_show',
            ],
            [
                'id'    => 22,
                'title' => 'epaper_delete',
            ],
            [
                'id'    => 23,
                'title' => 'epaper_access',
            ],
            [
                'id'    => 24,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 25,
                'title' => 'about_company_access',
            ],
            [
                'id'    => 26,
                'title' => 'about_mission_access',
            ],
            [
                'id'    => 27,
                'title' => 'about_specialization_card_access',
            ],
            [
                'id'    => 28,
                'title' => 'service_intro_access',
            ],
            [
                'id'    => 29,
                'title' => 'service_highlight_access',
            ],
            [
                'id'    => 30,
                'title' => 'service_card_access',
            ],
            [
                'id'    => 31,
                'title' => 'car_access',
            ],
            [
                'id'    => 32,
                'title' => 'car_create',
            ],
            [
                'id'    => 33,
                'title' => 'car_edit',
            ],
            [
                'id'    => 34,
                'title' => 'car_show',
            ],
            [
                'id'    => 35,
                'title' => 'car_delete',
            ],
            [
                'id'    => 36,
                'title' => 'car_enquiry_access',
            ],
            [
                'id'    => 37,
                'title' => 'booking_enquiry_access',
            ],
            [
                'id'    => 38,
                'title' => 'gallery_item_access',
            ],
        ];

        Permission::insertOrIgnore($permissions);
    }
}
