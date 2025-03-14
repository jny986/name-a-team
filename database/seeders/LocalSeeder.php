<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            [
                'email' => 'team@tes.com'
            ],
            [
                'name' => 'Team Tes',
                'password' => Hash::make('WeAreTeamTes!'),
                'email_verified_at' => now()
            ]
        );
    }
}
