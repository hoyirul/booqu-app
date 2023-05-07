<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('memberships')->insert([
            [
                'package' => 'Administrator',
                'description' => '-',
                'price' => 0,
                'unit' => 'tahun',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package' => 'Bronze',
                'description' => '-',
                'price' => 100000,
                'unit' => 'tahun',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'package' => 'Silver',
                'description' => '-',
                'price' => 120000,
                'unit' => 'tahun',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
