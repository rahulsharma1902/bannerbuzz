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
                'user_name' => 'admin',
                'first_name' => 'admin',
                'last_name' => 'main',
                'number' => '123456789',
                'email' => 'admin@gmail.com',
                'password' => "password",
                'is_admin' => true,
            ],
        ];
    
        foreach ($data as $d) {
            User::create([
                'user_name' => $d['user_name'],
                'first_name' => $d['first_name'],
                'last_name' => $d['last_name'],
                'number' => $d['number'],
                'email' => $d['email'],
                'password' => $d['password'],
                'is_admin' => $d['is_admin'],
            ]);
        }
    }
}
