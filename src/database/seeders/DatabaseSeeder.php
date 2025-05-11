<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Citas;
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
            'password' => bcrypt('pass111'),
            'role' => 'cliente',
        ]);

        User::factory()->create([
            'name' => 'Cliente 2',
            'email' => 'cliente2@example.com',
            'password' => bcrypt('pass222'),
            'role' => 'cliente',
        ]);

        Citas::factory()->create([
            'cliente_id' => '2',
            'marca' => 'BMW',
            'modelo'=> 'X5',
            'matricula'=> '5432WER',
            'fecha'=> null,
            'hora'=> null,
            'duracion'=> null,
        ]);

        Citas::factory()->create([
            'cliente_id' => '3',
            'marca' => 'AUDI',
            'modelo'=> 'Q5',
            'matricula'=> '234WLAN',
            'fecha'=> null,
            'hora'=> null,
            'duracion'=> null,
        ]);
    }
}
