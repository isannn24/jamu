<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanModel extends Model
{
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id_bahan';

    protected $allowedFields = [
        'nama_bahan',
        'stok',
        'satuan'
    ];
}