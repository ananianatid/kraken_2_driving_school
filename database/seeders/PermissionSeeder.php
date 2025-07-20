<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();

        $permissions = [
            ['name' => 'view_dashboard', 'readable_name' => 'View Dashboard'],
            ['name' => 'view_reports', 'readable_name' => 'View Reports'],
            ['name' => 'access_admin_panel', 'readable_name' => 'Access Admin Panel'],
            ['name' => 'manage_roles', 'readable_name' => 'Manage Roles'],
            ['name' => 'manage_permissions', 'readable_name' => 'Manage Permissions'],
            ['name' => 'view_users', 'readable_name' => 'View Users'],
            ['name' => 'create_users', 'readable_name' => 'Create Users'],
            ['name' => 'edit_users', 'readable_name' => 'Edit Users'],
            ['name' => 'delete_users', 'readable_name' => 'Delete Users'],
            ['name' => 'view_students', 'readable_name' => 'View Students'],
            ['name' => 'create_students', 'readable_name' => 'Create Students'],
            ['name' => 'edit_students', 'readable_name' => 'Edit Students'],
            ['name' => 'delete_students', 'readable_name' => 'Delete Students'],
        ];

        $now = Carbon::now();

        $dataToInsert = [];
        foreach ($permissions as $permission) {
            $dataToInsert[] = array_merge($permission, [
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('permissions')->insert($dataToInsert);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
