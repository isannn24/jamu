<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        /* =========================
           TOTAL DATA
        ========================== */

        $data['total_franchise'] = $db->table('franchise')->countAllResults();
        $data['total_produk']    = $db->table('produk_jamu')->countAllResults();
        $data['total_transaksi'] = $db->table('penjualan')->countAllResults();

        $omzet = $db->table('penjualan')
            ->selectSum('total')
            ->get()
            ->getRow();

        $data['total_omzet'] = $omzet->total ?? 0;
        $data['bagi_hasil_pusat'] = $data['total_omzet'] * 0.2;
        $data['bagi_hasil_mitra'] = $data['total_omzet'] * 0.8;

        /* =========================
           GRAFIK PENJUALAN
        ========================== */

        $penjualan = $db->table('penjualan')
            ->select('DATE(tanggal) as tanggal, SUM(total) as total')
            ->groupBy('DATE(tanggal)')
            ->orderBy('tanggal','ASC')
            ->get()
            ->getResultArray();

        $labelTanggal = [];
        $dataPenjualan = [];

        foreach ($penjualan as $p) {
            $labelTanggal[] = $p['tanggal'];
            $dataPenjualan[] = $p['total'];
        }

        $data['labelTanggal'] = $labelTanggal;
        $data['dataPenjualan'] = $dataPenjualan;

        /* =========================
           PIE CHART PRODUK (AMAN)
        ========================== */

        $produk = $db->table('detail_penjualan')
            ->select('produk_jamu.nama_produk, SUM(detail_penjualan.qty) as total_jual')
            ->join('produk_jamu','produk_jamu.id_produk = detail_penjualan.id_produk','left')
            ->groupBy('detail_penjualan.id_produk')
            ->get()
            ->getResultArray();

        $namaProduk = [];
        $totalProduk = [];

        foreach ($produk as $p) {
            $namaProduk[] = $p['nama_produk'] ?? 'Tidak diketahui';
            $totalProduk[] = $p['total_jual'];
        }

        $data['namaProduk'] = $namaProduk;
        $data['totalProduk'] = $totalProduk;

        /* =========================
           TRANSAKSI TERBARU (FIX)
        ========================== */

        $data['transaksi_terbaru'] = $db->table('penjualan')
            ->select('penjualan.id_penjualan, penjualan.tanggal, penjualan.total, franchise.nama_cabang')
            ->join('franchise','franchise.id_franchise = penjualan.id_franchise','left')
            ->orderBy('penjualan.id_penjualan','DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        /* =========================
           PRODUK TERLARIS (LIST)
        ========================== */

        $data['produk_terlaris'] = $db->table('detail_penjualan')
            ->select('produk_jamu.nama_produk, SUM(detail_penjualan.qty) as total_jual')
            ->join('produk_jamu','produk_jamu.id_produk = detail_penjualan.id_produk','left')
            ->groupBy('detail_penjualan.id_produk')
            ->orderBy('total_jual','DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        /* =========================
           CABANG TERLARIS
        ========================== */

        $data['cabang_terlaris'] = $db->table('penjualan')
            ->select('franchise.nama_cabang, SUM(penjualan.total) as total_penjualan')
            ->join('franchise','franchise.id_franchise = penjualan.id_franchise','left')
            ->groupBy('penjualan.id_franchise')
            ->orderBy('total_penjualan','DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        return view('admin/dashboard', $data);
    }
}