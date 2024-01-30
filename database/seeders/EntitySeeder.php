<?php

namespace Database\Seeders;

use App\Models\Entities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('entities')->truncate();

        Entities::truncate();
        $data = [
            [
                'name' => 'text',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'file',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'number',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'select',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'radio',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'checkbox',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'color',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'range',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($data as $d) {
            Entities::create([
                'name' => $d['name'],
                'status' => $d['status'],
                'created_at' => $d['created_at'],
                'updated_at' => $d['updated_at'],
            ]);
        }
    }
}
