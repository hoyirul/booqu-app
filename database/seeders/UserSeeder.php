<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name' => 'Administrator',
                'email' => 'admin@booqu.id',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'membership_id' => 1,
                'role_id' => 1,
                'is_active' => 'active',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
}
