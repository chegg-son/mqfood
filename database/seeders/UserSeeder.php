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
            'name' => 'Admin Utama',
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Admin Maqshaf',
            'username' => 'angga',
            'password' => bcrypt('anggapiat7'),
            'is_admin' => 2
        ]);

        User::create([
            'name' => 'Bro',
            'username' => 'supp',
            'password' => bcrypt('12345'),
            'is_admin' => 3
        ]);

        User::create([
            'name' => 'Akhir',
            'username' => 'supp1',
            'password' => bcrypt('12345'),
            'is_admin' => 3
        ]);

        User::create([
            'name' => 'Golden Boy',
            'username' => 'supp2',
            'password' => bcrypt('12345'),
            'is_admin' => 3
        ]);
    }
}
