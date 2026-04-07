<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Bahan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['bahan'] = $db->table('bahan_baku')
            ->get()
            ->getResultArray();

        return view('admin/bahan/index', $data);
    }

    public function tambah()
    {
        return view('admin/bahan/tambah');
    }

    public function simpan()
    {
        $db = \Config\Database::connect();

        $db->table('bahan_baku')->insert([
            'nama_bahan' => $this->request->getPost('nama_bahan'),
            'stok'       => $this->request->getPost('stok'),
            'satuan'     => $this->request->getPost('satuan')
        ]);

        return redirect()->to('/admin/bahan');
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();

        $data['bahan'] = $db->table('bahan_baku')
            ->where('id_bahan', $id)
            ->get()
            ->getRowArray();

        return view('admin/bahan/edit', $data);
    }

    public function update($id)
    {
        $db = \Config\Database::connect();

        $db->table('bahan_baku')
            ->where('id_bahan', $id)
            ->update([
                'nama_bahan' => $this->request->getPost('nama_bahan'),
                'stok'       => $this->request->getPost('stok'),
                'satuan'     => $this->request->getPost('satuan')
            ]);

        return redirect()->to('/admin/bahan');
    }

    public function hapus($id)
    {
        $db = \Config\Database::connect();

        $db->table('bahan_baku')
            ->where('id_bahan', $id)
            ->delete();

        return redirect()->to('/admin/bahan');
    }
}