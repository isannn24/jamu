<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class Pemesanan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['pesanan'] = $db->table('pemesanan_bahan p')
            ->select('p.*, b.nama_bahan, f.nama_cabang') 
            ->join('bahan_baku b', 'b.id_bahan = p.id_bahan')
            ->join('franchise f', 'f.id_franchise = p.id_franchise')
            ->where('p.id_franchise', session()->get('id_franchise'))
            ->get()
            ->getResultArray();

        return view('mitra/pemesanan/index', $data);
    }

    public function tambah()
    {
        $db = \Config\Database::connect();

        $data['bahan'] = $db->table('bahan_baku')->get()->getResultArray();

        return view('mitra/pemesanan/tambah', $data);
    }

    public function simpan()
    {
        $db = \Config\Database::connect();
    
        $db->table('pemesanan_bahan')->insert([
            'id_franchise'  => session()->get('id_franchise'),
            'id_bahan'      => $this->request->getPost('id_bahan'),
            'jumlah'        => $this->request->getPost('jumlah'),
            'tanggal_pesan' => date('Y-m-d'),
            'status'        => 'menunggu' 
        ]);
    
        return redirect()->to('/mitra/pemesanan');
    }
}