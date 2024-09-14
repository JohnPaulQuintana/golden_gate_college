<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $roles = ['admin'];
        foreach ($roles as $key => $r) {
            User::factory()->create([
                'role' => $r,
                'name' => ucwords($r.' Account'),
                'email' => $r.'@goldengate.com',
            ]);  
        }
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
