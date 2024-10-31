<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@gmail.com', 
                'phone' => '081234567890',
                'address' => 'Jl. Sudirman No. 1, Jakarta'
            ],
            [
                'name' => 'Siti Aminah',
                'email' => 'siti@gmail.com',
                'phone' => '082345678901', 
                'address' => 'Jl. Thamrin No. 2, Jakarta'
            ],
            [
                'name' => 'Rudi Hermawan',
                'email' => 'rudi@gmail.com',
                'phone' => '083456789012',
                'address' => 'Jl. Gatot Subroto No. 3, Jakarta' 
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@gmail.com',
                'phone' => '084567890123',
                'address' => 'Jl. Rasuna Said No. 4, Jakarta'
            ],
            [
                'name' => 'Ahmad Hidayat',
                'email' => 'ahmad@gmail.com',
                'phone' => '085678901234',
                'address' => 'Jl. Kuningan No. 5, Jakarta'
            ]
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
