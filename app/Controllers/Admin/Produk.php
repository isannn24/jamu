<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();

        $data['produk'] = $model->findAll();

        return view('admin/produk/index', $data);
    }

    public function tambah()
    {
        return view('admin/produk/tambah');
    }

    public function simpan()
    {
        $model = new ProdukModel();

        $foto = $this->request->getFile('foto');
        $namaFoto = '';

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads', $namaFoto);
        }

        $model->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga'       => $this->request->getPost('harga'),
            'khasiat'     => $this->request->getPost('khasiat'),
            'foto'        => $namaFoto
        ]);

        return redirect()->to('/admin/produk');
    }

    public function edit($id)
    {
        $model = new ProdukModel();

        $data['produk'] = $model->find($id);

        return view('admin/produk/edit', $data);
    }

    public function update($id)
    {
        $model = new ProdukModel();

        $foto = $this->request->getFile('foto');

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga'       => $this->request->getPost('harga'),
            'khasiat'     => $this->request->getPost('khasiat')
        ];

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads', $namaFoto);

            $data['foto'] = $namaFoto;
        }

        $model->update($id, $data);

        return redirect()->to('/admin/produk');
    }

    public function hapus($id)
    {
        $model = new ProdukModel();

        $model->delete($id);

        return redirect()->to('/admin/produk');
    }
}
