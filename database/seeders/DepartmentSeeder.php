<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => '_',
            ],
            [
                'name' => 'Human Resources',
                'description' => '_',
            ],
        ];
        
       foreach($departments as $departments) {
            Department::create($departments);
        }
    }
}