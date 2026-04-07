<?php

namespace App\Models;

use CodeIgniter\Model;

class FranchiseModel extends Model
{
    protected $table = 'franchise';
    protected $primaryKey = 'id_franchise';

    protected $allowedFields = [
        'nama_cabang',
        'pemilik',
        'alamat',
        'kota',
        'no_hp',
        'status'
    ];
}