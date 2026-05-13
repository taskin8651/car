<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $permissions = [
            ['id' => 25, 'title' => 'about_company_access'],
            ['id' => 26, 'title' => 'about_mission_access'],
            ['id' => 27, 'title' => 'about_specialization_card_access'],
            ['id' => 28, 'title' => 'service_intro_access'],
            ['id' => 29, 'title' => 'service_highlight_access'],
            ['id' => 30, 'title' => 'service_card_access'],
        ];

        foreach ($permissions as $permission) {
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
        DB::table('permission_role')->whereIn('permission_id', [25, 26, 27, 28, 29, 30])->delete();
        DB::table('permissions')->whereIn('id', [25, 26, 27, 28, 29, 30])->delete();
    }
};
