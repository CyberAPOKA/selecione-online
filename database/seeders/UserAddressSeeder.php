<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $users = User::where('id', '>', 0)->get();

        foreach ($users as $user) {
            DB::table('user_addresses')->insert([
                'user_id'       => $user->id,
                'state'      => $faker->state,
                'city'          => $faker->city,
                'number'        => $faker->buildingNumber,
                'zip_code'      => $faker->postcode,
                'address'        => $faker->address,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }
    }
}
