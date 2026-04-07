<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BahanBakuRempahSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['nama_bahan' => 'Jahe', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Serai', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Bunga Telang', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Rosela', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Kunyit', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Kencur', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Cengkeh', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Temulawak', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Kayu Manis', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Biji Adas', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Lengkuas', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Secang', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Pala', 'stok' => 0, 'satuan' => 'gram'],
            ['nama_bahan' => 'Kapulaga', 'stok' => 0, 'satuan' => 'gram'],
        ];

        foreach ($items as $item) {
            $exists = $this->db->table('bahan_baku')
                ->where('nama_bahan', $item['nama_bahan'])
                ->countAllResults();

            if ($exists == 0) {
                $this->db->table('bahan_baku')->insert($item);
            }
        }
    }
}
