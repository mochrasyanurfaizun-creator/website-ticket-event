<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@tixly.id'],   // cari berdasarkan email
            [
                'name'      => 'Admin TIXLY',
                'password'  => Hash::make('admin123'),  // ganti password ini
                'is_admin'  => true,
            ]
        );
    }
}