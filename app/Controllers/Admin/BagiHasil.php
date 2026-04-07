<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class BagiHasil extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // ambil input filter dari URL
        $periode = $this->request->getGet('periode');
        $id_franchise = $this->request->getGet('id_franchise');

        // Gunakan query builder untuk menghitung rekap dari tabel penjualan
        $builder = $db->table('penjualan p')
            ->select("
                DATE_FORMAT(p.tanggal, '%Y-%m') as periode,
                f.nama_cabang,
                f.pemilik,
                SUM(p.total) as total_omset,
                SUM(p.total) * 0.8 as bagian_mitra,
                SUM(p.total) * 0.2 as bagi_hasil_pusat
            ")
            ->join('franchise f', 'f.id_franchise = p.id_franchise')
            ->groupBy("periode, p.id_franchise");

        // kalau ada filter periode
        if ($periode) {
            $builder->where("DATE_FORMAT(p.tanggal, '%Y-%m') =", $periode);
        }

        // kalau ada filter franchise
        if ($id_franchise) {
            $builder->where('p.id_franchise', $id_franchise);
        }

        $data['bagi_hasil'] = $builder
            ->orderBy('periode', 'DESC')
            ->get()
            ->getResultArray();

        // Ambil data franchise untuk dropdown filter
        $data['franchise_list'] = $db->table('franchise')->get()->getResultArray();

        // kirim periode ke view 
        $data['periode'] = $periode;
        $data['id_franchise'] = $id_franchise;

        return view('admin/bagi_hasil/index', $data);
    }
}
