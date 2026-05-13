<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $permissions = [
            ['id' => 31, 'title' => 'car_access'],
            ['id' => 32, 'title' => 'car_create'],
            ['id' => 33, 'title' => 'car_edit'],
            ['id' => 34, 'title' => 'car_show'],
            ['id' => 35, 'title' => 'car_delete'],
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
        DB::table('permission_role')->whereIn('permission_id', [31, 32, 33, 34, 35])->delete();
        DB::table('permissions')->whereIn('id', [31, 32, 33, 34, 35])->delete();
    }
};
