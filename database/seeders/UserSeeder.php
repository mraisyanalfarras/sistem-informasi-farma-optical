<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adi = User::updateOrCreate([
            'name' => 'adi',
            'email' => 'adi@email.com',
            'password' => bcrypt('password'),
        ]);
        $adi->assignRole('super admin');

        $budi = User::updateOrCreate([
            'name' => 'Budi',
            'email' => 'budi@email.com',
            'password' => bcrypt('password'),
        ]);
        $budi->assignRole('admin');

        $cindy = User::updateOrCreate([
            'name' => 'cindy',
            'email' => 'cindy@email.com',
            'password' => bcrypt('password'),
        ]);
        $cindy->assignRole('admin');
        $cindy->givePermissionTo('delete users');

        $adi = User::updateOrCreate([
            'name' => 'super admin',
            'email' => 'superadmin@email.com',
            'password' => bcrypt('password'),
        ]);
        $adi->assignRole('super admin');
    }
}