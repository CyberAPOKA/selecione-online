<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Middleware\Admin;
use App\Models\Group;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            UserProfileSeeder::class,
            UserAddressSeeder::class,
            AdminSeeder::class,
            GroupSeeder::class,
            ProcessSeeder::class,
            RelationSeeder::class
        ]);
    }
}
