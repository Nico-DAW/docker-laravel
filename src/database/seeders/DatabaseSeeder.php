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
       
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'abc123..',
        ]);
        */
        
        User::factory()->create([
            'name' => 'Taller Piston',
            'email' => 'taller@piston.com',
            'password' => bcrypt('123pass'),
            'role' => 'taller',
        ]);
    
        User::factory()->create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@example.com',
            'password' => bcrypt('pass123'),
            'role' => 'cliente',
        ]);
    }
}
