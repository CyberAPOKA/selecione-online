<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Core\Constants\GroupType;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $enumValues = GroupType::getConstants();

        $data = [];

        foreach ($enumValues as $value) {
            $data[] = [
                'name' => $value,
            ];
        }

        DB::table('groups')->insert($data);
    }
}
