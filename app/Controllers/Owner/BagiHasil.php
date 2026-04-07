<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class BagiHasil extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // ambil input filter dari URL
        $periode = $this->request->getGet('periode');

        $builder = $db->table('bagi_hasil bh')
            ->join('franchise f', 'f.id_franchise = bh.id_franchise');

        // kalau ada filter
        if ($periode) {
            $builder->where('bh.periode', $periode);
        }

        $data['bagi_hasil'] = $builder
            ->orderBy('bh.periode', 'DESC')
            ->get()
            ->getResultArray();

        // kirim periode ke view 
        $data['periode'] = $periode;

        return view('owner/bagi_hasil/index', $data);
    }
}