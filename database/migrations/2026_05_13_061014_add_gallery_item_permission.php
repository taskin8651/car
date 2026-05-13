<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('permissions')->updateOrInsert(
            ['id' => 38],
            ['title' => 'gallery_item_access']
        );

        DB::table('permission_role')->insertOrIgnore([
            'permission_id' => 38,
            'role_id' => 1,
        ]);
    }

    public function down(): void
    {
        DB::table('permission_role')->where('permission_id', 38)->delete();
        DB::table('permissions')->where('id', 38)->delete();
    }
};
