<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();

        \App\Models\User::factory()->create([
            'name' => 'Meifie',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'pusat karir'
        ]);
    }
}
