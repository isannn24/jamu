<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukMenuSeeder extends Seeder
{
    public function run()
    {
        $items = [
            // ICE
            [
                'nama_produk' => 'Jahe Booster (Ice)',
                'harga'       => 10000,
                'khasiat'     => 'Menyegarkan tubuh, meningkatkan imun, membantu detoksifikasi, dan meredakan flu/batuk.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Kencur Booster (Ice)',
                'harga'       => 10000,
                'khasiat'     => 'Menyegarkan tubuh, meningkatkan imun, melancarkan pencernaan, dan membantu detoksifikasi.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Kunyit Booster (Ice)',
                'harga'       => 10000,
                'khasiat'     => 'Anti-inflamasi alami, meningkatkan imun, membantu detoksifikasi, dan mengurangi stres.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Kunjaruk (Ice)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan imun tubuh, mengurangi lelah/stres, melancarkan pencernaan, dan detox alami.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Jancruk (Ice)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan imun, mengurangi rasa lelah, membantu pencernaan, dan detox alami.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Teh Bunga Rosela (Ice Tea)',
                'harga'       => 10000,
                'khasiat'     => 'Baik untuk imun, kesehatan mata, sirkulasi darah, dan membantu menurunkan tekanan darah.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Teh Bunga Telang (Ice Tea)',
                'harga'       => 10000,
                'khasiat'     => 'Baik untuk imun, kesehatan mata, sirkulasi darah, dan membantu menurunkan tekanan darah.',
                'foto'        => '',
            ],

            // HOT
            [
                'nama_produk' => 'Wedang Rempah (Hot)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan daya tahan tubuh, menjaga kesehatan jantung, melancarkan pencernaan, dan meredakan pegal.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Susu Jahe Rempah (Hot)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan daya tahan tubuh, menambah energi/stamina, memberi efek relaksasi, dan baik untuk pencernaan.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Wedang Temulawak (Hot)',
                'harga'       => 10000,
                'khasiat'     => 'Menjaga kesehatan hati, meningkatkan nafsu makan, menambah stamina, serta membantu metabolisme.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Wedang Kencur (Hot)',
                'harga'       => 10000,
                'khasiat'     => 'Meredakan flu/batuk, menghangatkan tubuh, meningkatkan daya tahan tubuh, dan membantu meredakan nyeri.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'STMJ (Hot)',
                'harga'       => 15000,
                'khasiat'     => 'Meningkatkan stamina, membantu pemulihan tubuh, melancarkan peredaran darah, dan menambah energi.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Wedang Uwuh (Hot)',
                'harga'       => 10000,
                'khasiat'     => 'Menghangatkan tubuh, melancarkan peredaran darah, meredakan masuk angin/flu, dan menenangkan tubuh.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Wedang Kunyit (Hot)',
                'harga'       => 10000,
                'khasiat'     => 'Anti-inflamasi, melancarkan pencernaan, meningkatkan imun, dan membantu menurunkan tekanan darah.',
                'foto'        => '',
            ],
            [
                'nama_produk' => 'Wedang Lengkuas (Hot)',
                'harga'       => 10000,
                'khasiat'     => 'Melancarkan pencernaan, meredakan batuk, menghangatkan tubuh, dan mendukung kesehatan jantung.',
                'foto'        => '',
            ],
        ];

        foreach ($items as $item) {
            $exists = $this->db->table('produk_jamu')
                ->where('nama_produk', $item['nama_produk'])
                ->countAllResults();

            if ($exists == 0) {
                $this->db->table('produk_jamu')->insert($item);
            }
        }
    }
}
