<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function omset()
    {
        $db = \Config\Database::connect();

        // ambil filter bulan
        $periode = $this->request->getGet('periode');

        $builder = $db->table('penjualan p')
            ->join('franchise f', 'f.id_franchise = p.id_franchise');

        // filter jika dipilih
        if (!empty($periode)) {
            $builder->where('DATE_FORMAT(p.tanggal, "%Y-%m")', $periode);
        }

        // data tabel
        $data['laporan'] = $builder
            ->select('f.nama_cabang, DATE_FORMAT(p.tanggal,"%Y-%m") as periode, SUM(p.total) as total_omset')
            ->groupBy('p.id_franchise, periode')
            ->orderBy('periode', 'DESC')
            ->get()
            ->getResultArray();

        // DATA GRAFIK (IKUT FILTER)
        $grafikBuilder = $db->table('penjualan');

        if (!empty($periode)) {
            $grafikBuilder->where('DATE_FORMAT(tanggal, "%Y-%m")', $periode);
        }

        $grafik = $grafikBuilder
            ->select('DATE_FORMAT(tanggal,"%Y-%m") as bulan, SUM(total) as total')
            ->groupBy('bulan')
            ->orderBy('bulan', 'ASC')
            ->get()
            ->getResult();

        $data['bulan'] = array_column($grafik, 'bulan');
        $data['total'] = array_column($grafik, 'total');

        $data['periode'] = $periode;

        return view('owner/laporan/omset', $data);
    }


    public function exportPdf()
    {
        $db = \Config\Database::connect();

        $periode = $this->request->getGet('periode');

        $builder = $db->table('penjualan p')
            ->join('franchise f', 'f.id_franchise = p.id_franchise');

        if (!empty($periode)) {
            $builder->where('DATE_FORMAT(p.tanggal, "%Y-%m")', $periode);
        }

        $data['laporan'] = $builder
            ->select('f.nama_cabang, SUM(p.total) as total_omset')
            ->groupBy('p.id_franchise')
            ->get()
            ->getResultArray();

        // hitung total semua
        $total_semua = 0;
        foreach ($data['laporan'] as $l) {
            $total_semua += $l['total_omset'];
        }

        $data['total_semua'] = $total_semua;
        $data['periode'] = $periode;

        // load view PDF
        $html = view('owner/laporan/pdf', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("laporan-omset.pdf", ["Attachment" => false]);
    }
}