<?php

namespace Database\Seeders;

use App\Models\PackingTypeCarton;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackingTypeCartonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packings = [
            [
                'name' => 'PAKAI EXPORT CARTON BIASA',
                'satuan' => 'BOX'
            ],
            [
                'name' => 'PAKAI LAYER',
                'satuan' => 'LBR'
            ],
        ];

        foreach ($packings as $packing) {
            PackingTypeCarton::create($packing);
        }
    }
}
