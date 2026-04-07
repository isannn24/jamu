<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class Produk extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $keyword = trim((string) $this->request->getGet('q'));

        $builder = $db->table('produk_jamu');
        if ($keyword !== '') {
            $builder->like('nama_produk', $keyword);
        }

        $data['produk'] = $builder
            ->orderBy('nama_produk', 'ASC')
            ->get()
            ->getResultArray();

        $data['keyword'] = $keyword;

        return view('mitra/produk/index', $data);
    }
}
