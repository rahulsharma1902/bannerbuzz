<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::truncate();

        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => "password",
                'is_admin' => true,
            ],
        ];

        foreach ($data as $d) {
            User::create([
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => $d['password'],
                'is_admin' => $d['is_admin'],
            ]);
        }
    }
}
