<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventorie')->insert([
            [
                'nama' => 'Pupuk NPK',
                'harga' => 35000,
                'stok' => 7,
                'satuan' => 'kg'
            ],
            [
                'nama' => 'Pupuk Cair',
                'harga' => 50000,
                'stok' => 3,
                'satuan' => 'kg'
            ],
            [
                'nama' => 'Bibit Jagung',
                'harga' => 63000,
                'stok' => 10,
                'satuan' => 'kg'
            ]
        ]);
    }
}
