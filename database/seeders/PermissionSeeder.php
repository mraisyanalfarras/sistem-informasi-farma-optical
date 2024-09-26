<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission for managing users
        Permission::updateOrCreate(['name' => 'show users']);
        Permission::updateOrCreate(['name' => 'add users']);
        Permission::updateOrCreate(['name' => 'edit users']);
        Permission::updateOrCreate(['name' => 'delete users']);

        // Permission for managing departments
        Permission::updateOrCreate(['name' => 'show department']);
        Permission::updateOrCreate(['name' => 'add department']);
        Permission::updateOrCreate(['name' => 'edit department']);
        Permission::updateOrCreate(['name' => 'delete department']);
    }
}
