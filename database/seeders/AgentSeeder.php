<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([

            'name' => 'Agent One',

            'email' => 'agent1@example.com',

            'password' => Hash::make('password123'), // Gantilah dengan password yang aman

            'role' => 'agent',

        ]);


        User::create([

            'name' => 'Agent Two',

            'email' => 'agent2@example.com',

            'password' => Hash::make('password123'), // Gantilah dengan password yang aman

            'role' => 'agent',

        ]);
    }
}
