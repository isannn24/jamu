<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';

    protected $allowedFields = [
        'id_franchise',
        'id_produk',
        'tanggal',
        'jumlah',
        'total'
    ];
}