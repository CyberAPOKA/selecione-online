<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Core\Constants\GroupType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProcessSeeder extends Seeder
{
    public function run(): void
    {
        $names = ['APOKA', 'MAGUILA', 'XESQUEDELE', 'BIRIGUILIS', 'WILLYWILLY'];

        for ($i = 0; $i < 100; $i++) {
            $name = $names[array_rand($names)];
            $group = GroupType::getRandomValue();

            $initialDate = Carbon::now()->subDays(rand(1, 30));
            $finalDate = $initialDate->copy()->addDays(rand(1, 10));
            $resultDate = $finalDate->copy()->addDays(rand(1, 5));

            DB::table('processes')->insert([
                'name' => $name,
                'group' => $group,
                'initial_date' => $initialDate,
                'final_date' => $finalDate,
                'result_date' => $resultDate,
            ]);
        }
    }
}
