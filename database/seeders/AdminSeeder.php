<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name'     => 'Annie Batumbakal',
                'email'    => 'batumbakala@univ.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name'     => 'Juan Dela Cruz',
                'email'    => 'delacruzj@univ.com',
                'password' => Hash::make('securepassword'),
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
