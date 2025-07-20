<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate();

        // Insérer les rôles souhaités
        DB::table('roles')->insert([
            ['name' => 'administrator', 'created_at' => now(), 'updated_at' => now()], // Les timestamps ne sont pas mentionnés mais sont une bonne pratique.
            ['name' => 'teacher', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'student', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
