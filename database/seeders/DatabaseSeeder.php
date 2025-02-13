<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Box;
use App\Models\Tenant;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Tom Mauboussin',
            'email' => 'test@example.com',
            'password' => Hash::make('Azerty01'),
        ]);
        User::factory(10)->create();
        Box::factory(10)->create();
        Tenant::factory(10)->create();
    }
}
