<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class Penjualan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $idFranchise = session()->get('id_franchise');

        $bulan = $this->request->getGet('bulan');

        $builder = $db->table('penjualan')
            ->where('id_franchise', $idFranchise);

        // FILTER BULAN
        if ($bulan) {
            $builder->where("DATE_FORMAT(tanggal,'%Y-%m')", $bulan);
        }

        // DATA TABEL
        $data['penjualan'] = $builder
            ->orderBy('tanggal', 'DESC')
            ->get()
            ->getResultArray();

        // GRAFIK
        $grafik = $db->table('penjualan')
            ->select("DATE_FORMAT(tanggal,'%Y-%m') as bulan, SUM(total) as total")
            ->where('id_franchise', $idFranchise)
            ->groupBy("DATE_FORMAT(tanggal,'%Y-%m')")
            ->orderBy('bulan','ASC')
            ->get()
            ->getResult();

        $data['bulanChart'] = array_column($grafik, 'bulan');
        $data['totalChart'] = array_column($grafik, 'total');

        $data['filter_bulan'] = $bulan;

        return view('mitra/penjualan/index', $data);
    }

    public function detail($id)
    {
        $db = \Config\Database::connect();

        // HEADER
        $data['header'] = $db->table('penjualan')
            ->where('id_penjualan', $id)
            ->get()
            ->getRowArray();

        // DETAIL PRODUK
        $data['detail'] = $db->table('detail_penjualan d')
            ->select('p.nama_produk, d.qty, d.harga, (d.qty * d.harga) as subtotal')
            ->join('produk_jamu p', 'p.id_produk = d.id_produk')
            ->where('d.id_penjualan', $id)
            ->get()
            ->getResultArray();

        return view('mitra/penjualan/detail', $data);
    }

    public function tambah()
    {
        $db = \Config\Database::connect();

        $data['produk'] = $db->table('produk_jamu')->get()->getResultArray();

        return view('mitra/penjualan/tambah', $data);
    }

    public function simpan()
    {
        $db = \Config\Database::connect();

        $produk = $this->request->getPost('produk');
        $qty    = $this->request->getPost('qty');
        $tanggal = $this->request->getPost('tanggal');

        $idFranchise = session()->get('id_franchise');

        // VALIDASI DASAR
        if (!$produk || !$qty || !$tanggal) {
            return redirect()->back()->with('error', 'Data tidak lengkap');
        }

        $total = 0;

        // HITUNG TOTAL
        foreach ($produk as $i => $idProduk) {

            if (empty($idProduk) || empty($qty[$i])) continue;

            $dataProduk = $db->table('produk_jamu')
                ->where('id_produk', $idProduk)
                ->get()
                ->getRowArray();

            if (!$dataProduk) continue;

            $total += $dataProduk['harga'] * $qty[$i];
        }

        // INSERT HEADER PENJUALAN
        $db->table('penjualan')->insert([
            'tanggal'       => $tanggal,
            'id_franchise'  => $idFranchise,
            'total'         => $total
        ]);

        $idPenjualan = $db->insertID();

        // INSERT DETAIL PRODUK
        foreach ($produk as $i => $idProduk) {

            if (empty($idProduk) || empty($qty[$i])) continue;

            $dataProduk = $db->table('produk_jamu')
                ->where('id_produk', $idProduk)
                ->get()
                ->getRowArray();

            if (!$dataProduk) continue;

            $db->table('detail_penjualan')->insert([
                'id_penjualan' => $idPenjualan,
                'id_produk'    => $idProduk,
                'qty'          => $qty[$i],
                'harga'        => $dataProduk['harga']
            ]);
        }

        return redirect()->to('/mitra/penjualan')
            ->with('success', 'Penjualan berhasil disimpan');
    }
}