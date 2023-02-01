<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Finalis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Finalis::create(([
            'name' => 'Putri Aulia',
            'image' => 'PutriAulia.jpg',
            'tahun' => '2023',


        ]));
        Finalis::create(([
            'name' => 'Aulia Putri',
            'image' => 'AuliaPutri.jpg',
            'tahun' => '2023',
        ]));
        Finalis::create(([
            'name' => 'Putri',
            'image' => 'Putri.jpg',
            'tahun' => '2023',
        ]));
        Finalis::create(([
            'name' => 'PutriLia',
            'image' => 'AuliaPutri.jpg',
            'tahun' => '2024',
        ]));
    }
}
