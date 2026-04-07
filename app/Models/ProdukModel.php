<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk_jamu';
    protected $primaryKey = 'id_produk'; // PERBAIKI DISINI

    protected $allowedFields = [
        'nama_produk',
        'harga',
        'foto',
        'khasiat'
    ];
}