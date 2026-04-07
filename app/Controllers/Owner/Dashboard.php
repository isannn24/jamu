<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // TOTAL OMSET
        $omzet = $db->table('penjualan')
            ->selectSum('total')
            ->get()
            ->getRow();

        $totalOmset = $omzet ? ($omzet->total ?? 0) : 0;
        $bagiHasilPusat = $totalOmset * 0.2;
        $bagiHasilMitra = $totalOmset * 0.8;

        // TOTAL CABANG
        $totalCabang = $db->table('franchise')
            ->countAllResults();

        // TOTAL TRANSAKSI
        $totalTransaksi = $db->table('penjualan')
            ->countAllResults();

        // GRAFIK BULANAN
        $grafik = $db->table('penjualan')
            ->select("DATE_FORMAT(tanggal,'%Y-%m') as bulan, SUM(total) as total")
            ->groupBy("DATE_FORMAT(tanggal,'%Y-%m')")
            ->orderBy("bulan", "ASC")
            ->get()
            ->getResultArray();

        $bulan = [];
        $total = [];

        foreach ($grafik as $row) {
            $bulan[] = $row['bulan'];
            $total[] = (int)$row['total'];
        }

        // GRAFIK PER CABANG + RANKING
        $cabang = $db->table('penjualan p')
            ->select('f.nama_cabang, SUM(p.total) as total_penjualan')
            ->join('franchise f', 'f.id_franchise = p.id_franchise')
            ->groupBy('p.id_franchise')
            ->orderBy('total_penjualan', 'DESC')
            ->get()
            ->getResultArray();

        $namaCabang = [];
        $totalCabangChart = [];

        foreach ($cabang as $row) {
            $namaCabang[] = $row['nama_cabang'];
            $totalCabangChart[] = (int)$row['total_penjualan'];
        }

        return view('owner/dashboard', [
            'totalOmset' => $totalOmset,
            'bagiHasilPusat' => $bagiHasilPusat,
            'bagiHasilMitra' => $bagiHasilMitra,
            'totalCabang' => $totalCabang,
            'totalTransaksi' => $totalTransaksi,
            'bulan' => $bulan,
            'total' => $total,
            'namaCabang' => $namaCabang,
            'totalCabangChart' => $totalCabangChart,
            'rankingCabang' => $cabang // ranking
        ]);
    }
}