<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Fulan',
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Si Flan User',
            'username' => 'user',
            'password' => bcrypt('12345'),
            'is_admin' => false
        ]);
    }
}
