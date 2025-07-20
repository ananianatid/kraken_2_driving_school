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
        // Désactive temporairement les contraintes de clé étrangère [similaire à la migration 14]
        DB::statement('PRAGMA foreign_keys = OFF;'); // Pour SQLite, si vous utilisez d'autres bases de données, la syntaxe peut varier.

        // Supprime toutes les permissions existantes avant d'en insérer de nouvelles
        DB::table('permissions')->truncate(); // Truncate est plus rapide que delete pour vider la table

        $permissions = [
            // Permissions de tableau de bord et rapports
            ['name' => 'view_dashboard', 'readable_name' => 'View Dashboard'],
            ['name' => 'view_reports', 'readable_name' => 'View Reports'],

            // Permissions du panneau d'administration
            ['name' => 'access_admin_panel', 'readable_name' => 'Access Admin Panel'],

            // Permissions de gestion des rôles et permissions
            ['name' => 'manage_roles', 'readable_name' => 'Manage Roles'],
            ['name' => 'manage_permissions', 'readable_name' => 'Manage Permissions'],

            // Permissions de gestion des utilisateurs
            ['name' => 'view_users', 'readable_name' => 'View Users'],
            ['name' => 'create_users', 'readable_name' => 'Create Users'],
            ['name' => 'edit_users', 'readable_name' => 'Edit Users'],
            ['name' => 'delete_users', 'readable_name' => 'Delete Users'],

            // Permissions de gestion des étudiants (comme mentionné dans la description du projet) [2]
            ['name' => 'view_students', 'readable_name' => 'View Students'],
            ['name' => 'create_students', 'readable_name' => 'Create Students'],
            ['name' => 'edit_students', 'readable_name' => 'Edit Students'],
            ['name' => 'delete_students', 'readable_name' => 'Delete Students'],
        ];

        $now = Carbon::now(); // Obtient la date et l'heure actuelles [extérieur des sources, connaissance générale de Laravel]

        // Prépare les données avec les timestamps
        $dataToInsert = [];
        foreach ($permissions as $permission) {
            $dataToInsert[] = array_merge($permission, [
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Insère les permissions dans la base de données
        DB::table('permissions')->insert($dataToInsert);

        // Réactive les contraintes de clé étrangère
        DB::statement('PRAGMA foreign_keys = ON;'); // Pour SQLite
    }
}
