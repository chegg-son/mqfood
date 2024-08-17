<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Transaksi;
use Faker\Factory;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // below using faker for db
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Transaksi::create([
                'jenis_transaksi' => $faker->randomElement(['pembelian', 'penjualan']),
                'faktur' => $faker->ean8,
                'nota' => $faker->ean8,
            ]);
        }
    }
}
