<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),//hash para la contraseña
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Añadir más usuarios aquí...
             DB::table('users')->insert([
                 'name' => 'Jane Doe',
                 'email' => 'jane.doe@example.com',
                 'password' => Hash::make('password123'),//hash para la contraseña
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);


    }
}
