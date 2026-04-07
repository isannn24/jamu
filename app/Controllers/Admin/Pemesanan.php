<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pemesanan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['pesanan'] = $db->table('pemesanan_bahan p')
            ->select('p.*, f.nama_cabang, b.nama_bahan')
            ->join('franchise f', 'f.id_franchise = p.id_franchise')
            ->join('bahan_baku b', 'b.id_bahan = p.id_bahan')
            ->get()
            ->getResultArray();

        return view('admin/pemesanan/index', $data); 
    }

    // PROSES (belum kirim)
    public function proses($id)
    {
        $db = \Config\Database::connect();

        $db->table('pemesanan_bahan')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 'diproses'
            ]);

        return redirect()->to('/admin/pemesanan'); 
    }

    // KIRIM + KURANGI STOK
    public function kirim($id)
    {
        $db = \Config\Database::connect();

        $pesanan = $db->table('pemesanan_bahan')
            ->where('id_pemesanan', $id)
            ->get()
            ->getRowArray();

        // VALIDASI STOK
        $bahan = $db->table('bahan_baku')
            ->where('id_bahan', $pesanan['id_bahan'])
            ->get()
            ->getRowArray();

        if ($bahan['stok'] < $pesanan['jumlah']) {
            return redirect()->back()->with('error', 'Stok tidak cukup!');
        }

        // KURANGI STOK
        $db->table('bahan_baku')
            ->where('id_bahan', $pesanan['id_bahan'])
            ->set('stok', 'stok - '.$pesanan['jumlah'], false)
            ->update();

        // UPDATE STATUS
        $db->table('pemesanan_bahan')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 'dikirim'
            ]);

        return redirect()->to('/admin/pemesanan');
    }

    // SELESAI
    public function selesai($id)
    {
        $db = \Config\Database::connect();

        $db->table('pemesanan_bahan')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 'selesai'
            ]);

        return redirect()->to('/admin/pemesanan');
    }

    // TOLAK
    public function tolak($id)
    {
        $db = \Config\Database::connect();

        $db->table('pemesanan_bahan')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 'ditolak'
            ]);

        return redirect()->to('/admin/pemesanan');
    }
}