<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // using faker
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Barang::create([
                'kode_barang' => $faker->ean8,
                'nama_barang' => $faker->name,
                'stok' => $faker->numberBetween(0, 100),
                'harga' => $faker->numberBetween(0, 1000),
                'kelas' => $faker->randomElement(['A', 'B', 'C']),
            ]);
        }
    }
}
