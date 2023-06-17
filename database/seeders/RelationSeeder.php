<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Process;
use Illuminate\Support\Facades\DB;

class RelationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $processes = Process::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            $userId = $users[array_rand($users)];
            $processId = $processes[array_rand($processes)];

            DB::table('relations')->insert([
                'user_id' => $userId,
                'process_id' => $processId,
            ]);
        }
    }
}
