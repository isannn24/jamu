<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $id_franchise = session()->get('id_franchise');

        // TOTAL PENJUALAN
        $total_penjualan = $db->table('penjualan')
            ->selectSum('total')
            ->where('id_franchise', $id_franchise)
            ->get()
            ->getRow()
            ->total ?? 0;

        // TOTAL PESANAN
        $total_pesanan = $db->table('pemesanan_bahan')
            ->where('id_franchise', $id_franchise)
            ->countAllResults();

        // BAGI HASIL
        $bagian_mitra = $total_penjualan * 0.8;
        $bagian_pusat = $total_penjualan * 0.2;

        // PIE CHART PRODUK TERLARIS
        $produk = $db->table('detail_penjualan d')
            ->select('p.nama_produk, SUM(d.qty) as total')
            ->join('produk_jamu p', 'p.id_produk = d.id_produk')
            ->join('penjualan pj', 'pj.id_penjualan = d.id_penjualan')
            ->where('pj.id_franchise', $id_franchise)
            ->groupBy('d.id_produk')
            ->get()
            ->getResult();

        $namaProduk = [];
        $totalProduk = [];

        foreach ($produk as $row) {
            $namaProduk[] = $row->nama_produk;
            $totalProduk[] = (int)$row->total;
        }

        // GRAFIK OMSET BULANAN
        $grafik = $db->table('penjualan')
            ->select("DATE_FORMAT(tanggal,'%Y-%m') as bulan, SUM(total) as total")
            ->where('id_franchise', $id_franchise)
            ->groupBy("DATE_FORMAT(tanggal,'%Y-%m')")
            ->orderBy('bulan','ASC')
            ->get()
            ->getResult();

        $bulan = array_column($grafik, 'bulan');
        $total = array_column($grafik, 'total');

        return view('mitra/dashboard', [
            'total_penjualan' => $total_penjualan,
            'total_pesanan'   => $total_pesanan,
            'bagian_mitra'    => $bagian_mitra,
            'bagian_pusat'    => $bagian_pusat,
            'namaProduk'      => $namaProduk,
            'totalProduk'     => $totalProduk,
            'bulan'           => $bulan,
            'total'           => $total
        ]);
    }
}