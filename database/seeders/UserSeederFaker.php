<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeederFaker extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) { 
            User::factory()->create([
                'username' => fake()->email(),
                'alamat' => fake()->address(),
                'password' => Hash::make('testing'),
                'role' => 'masyarakat',
                'nik' => 1000000000000000+$i,
                'nohandphone' => rand(100000,9999999999999999)
            ]);
        }
    }
}
