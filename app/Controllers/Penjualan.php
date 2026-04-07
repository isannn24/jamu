<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penjualan extends BaseController
{

    public function index()
    {
        $db = \Config\Database::connect();

        $role = session()->get('role');
        $id_franchise = (int) session()->get('id_franchise');

        $keyword = $this->request->getGet('keyword');
        $cabang  = $this->request->getGet('cabang');
        $tanggal = $this->request->getGet('tanggal');

        // PAGINATION
        $limit = 10;
        $page  = (int) ($this->request->getGet('page') ?? 1);
        $offset = ($page - 1) * $limit;

        $builder = $db->table('penjualan p')
            ->select('p.id_penjualan, p.tanggal, p.total, f.nama_cabang, p.id_franchise')
            ->join('franchise f', 'f.id_franchise = p.id_franchise', 'left');

        // MITRA
        if ($role == 'mitra') {
            $builder->where('p.id_franchise', $id_franchise);
        }

        // FILTER
        if ($keyword) {
            $builder->like('f.nama_cabang', $keyword);
        }

        if ($cabang) {
            $builder->where('p.id_franchise', $cabang);
        }

        if ($tanggal) {
            $builder->where('p.tanggal', $tanggal);
        }

        // total data
        $totalData = $builder->countAllResults(false);

        // data tampil
        $data['penjualan'] = $builder
            ->orderBy('p.tanggal', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();

        $data['listCabang'] = $db->table('franchise')->get()->getResultArray();

        $data['currentPage'] = $page;
        $data['totalPage']   = ceil($totalData / $limit);

        return view('penjualan/index', $data);
    }


    public function detail($id)
    {
        $db = \Config\Database::connect();

        $data['header'] = $db->table('penjualan')
            ->where('id_penjualan', $id)
            ->get()
            ->getRowArray();

        $data['detail'] = $db->table('detail_penjualan d')
            ->select('p.nama_produk, d.qty, d.harga, (d.qty*d.harga) as subtotal')
            ->join('produk_jamu p', 'p.id_produk = d.id_produk')
            ->where('d.id_penjualan', $id)
            ->get()
            ->getResultArray();

        return view('penjualan/detail', $data);
    }


    public function tambah()
    {
        $db = \Config\Database::connect();

        $data['produk'] = $db->table('produk_jamu')->get()->getResultArray();

        return view('penjualan/tambah', $data);
    }


    public function simpan()
    {
        $db = \Config\Database::connect();

        $produk  = $this->request->getPost('produk');
        $qty     = $this->request->getPost('qty');
        $tanggal = $this->request->getPost('tanggal');

        $id_franchise = session()->get('id_franchise');

        if (!$id_franchise) {
            return redirect()->to('/login');
        }

        $total = 0;

        foreach ($produk as $i => $idProduk) {

            if (empty($idProduk) || empty($qty[$i])) continue;

            $dataProduk = $db->table('produk_jamu')
                ->where('id_produk', $idProduk)
                ->get()
                ->getRowArray();

            if (!$dataProduk) continue;

            $total += $dataProduk['harga'] * $qty[$i];
        }

        $db->table('penjualan')->insert([
            'tanggal'      => $tanggal,
            'id_franchise' => $id_franchise,
            'total'        => $total
        ]);

        $idPenjualan = $db->insertID();

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

        return redirect()->to('/penjualan')->with('success', 'Penjualan berhasil disimpan');
    }


    // LAPORAN + PAGINATION
    public function laporan()
    {
        $db = \Config\Database::connect();

        $cabang = $this->request->getGet('cabang');

        $limit = 10;
        $page  = (int) ($this->request->getGet('page_laporan') ?? 1);
        $offset = ($page - 1) * $limit;

        $builder = $db->table('penjualan p')
            ->select('p.id_penjualan, p.tanggal, p.total, f.nama_cabang')
            ->join('franchise f', 'f.id_franchise = p.id_franchise');

        if ($cabang) {
            $builder->where('p.id_franchise', $cabang);
        }

        $totalData = $builder->countAllResults(false);

        $data['penjualan'] = $builder
            ->orderBy('p.tanggal', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();

        $data['listCabang'] = $db->table('franchise')->get()->getResultArray();
        $data['filterCabang'] = $cabang;

        $data['currentPage'] = $page;
        $data['totalPage']   = ceil($totalData / $limit);

        return view('penjualan/laporan', $data);
    }


    public function exportPDF()
    {
        $db = \Config\Database::connect();

        $cabang = $this->request->getGet('cabang');

        $builder = $db->table('penjualan p')
            ->select('p.id_penjualan, p.tanggal, p.total, f.nama_cabang')
            ->join('franchise f', 'f.id_franchise = p.id_franchise');

        if ($cabang) {
            $builder->where('p.id_franchise', $cabang);
        }

        $data['penjualan'] = $builder
            ->orderBy('p.tanggal', 'DESC')
            ->get()
            ->getResultArray();

        $html = view('penjualan/laporan_pdf', $data);

        $dompdf = new \Dompdf\Dompdf();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan_penjualan.pdf", ["Attachment" => false]);
    }
}