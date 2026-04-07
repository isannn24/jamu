<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class RekapHarian extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $idFranchise = session()->get('id_franchise');
        $tanggal = $this->request->getGet('tanggal') ?: date('Y-m-d');

        $penjualan = $db->table('penjualan')
            ->where('id_franchise', $idFranchise)
            ->where('tanggal', $tanggal)
            ->orderBy('id_penjualan', 'DESC')
            ->get()
            ->getResultArray();

        $ringkasan = $db->table('penjualan')
            ->select('COUNT(*) as jumlah_transaksi, COALESCE(SUM(total), 0) as total_omzet')
            ->where('id_franchise', $idFranchise)
            ->where('tanggal', $tanggal)
            ->get()
            ->getRowArray();

        $produk = $db->table('detail_penjualan d')
            ->select('p.nama_produk, SUM(d.qty) as total_qty, SUM(d.qty * d.harga) as total_nilai')
            ->join('penjualan pj', 'pj.id_penjualan = d.id_penjualan')
            ->join('produk_jamu p', 'p.id_produk = d.id_produk')
            ->where('pj.id_franchise', $idFranchise)
            ->where('pj.tanggal', $tanggal)
            ->groupBy('d.id_produk, p.nama_produk')
            ->orderBy('total_qty', 'DESC')
            ->get()
            ->getResultArray();

        return view('mitra/rekap_harian/index', [
            'tanggal'   => $tanggal,
            'penjualan' => $penjualan,
            'ringkasan' => $ringkasan,
            'produk'    => $produk,
        ]);
    }
}
