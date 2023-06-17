<?php

namespace Database\Seeders;

use App\Core\Constants\AdminType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ADMINISTRADOR
        // DB::table('admins')->insert([
        //     'email'         => 'selecione@online.com',
        //     'password'      => Hash::make('secret'),
        //     'type' => AdminType::SUPERADMIN,
        //     'created_at'    => now(),
        //     'updated_at'    => now()
        // ]);

        DB::table('admins')->insert([
            'email'         => 'admin@health.com',
            'password'      => Hash::make('secret'),
            'type' => AdminType::HEALTH,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        DB::table('admins')->insert([
            'email'         => 'admin@assistance.com',
            'password'      => Hash::make('secret'),
            'type' => AdminType::ASSISTANCE,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        DB::table('admins')->insert([
            'email'         => 'admin@education.com',
            'password'      => Hash::make('secret'),
            'type' => AdminType::EDUCATION,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
