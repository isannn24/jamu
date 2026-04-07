<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        // Ambil data user dengan role mitra beserta info franchisenya
        $data['users'] = $db->table('user u')
            ->select('u.*, f.nama_cabang, f.pemilik')
            ->join('franchise f', 'f.id_franchise = u.id_franchise', 'left')
            ->where('u.role', 'mitra')
            ->orderBy('u.id_user', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/user/index', $data);
    }

    public function tambah()
    {
        $db = \Config\Database::connect();
        
        // Ambil data franchise yang belum memiliki akun user mitra (opsional) atau semua franchise
        $data['franchise'] = $db->table('franchise')->get()->getResultArray();

        return view('admin/user/tambah', $data);
    }

    public function simpan()
    {
        $db = \Config\Database::connect();

        $data = [
            'username'     => $this->request->getPost('username'),
            'password'     => $this->request->getPost('password'), // Sebaiknya dihash: password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            'role'         => 'mitra',
            'id_franchise' => $this->request->getPost('id_franchise')
        ];

        // Validasi sederhana (pastikan username belum ada)
        $cek = $db->table('user')->where('username', $data['username'])->countAllResults();
        if ($cek > 0) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan');
        }

        $db->table('user')->insert($data);

        return redirect()->to('/admin/user')->with('success', 'User mitra berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $db = \Config\Database::connect();
        $db->table('user')->where('id_user', $id)->delete();

        return redirect()->to('/admin/user')->with('success', 'User mitra berhasil dihapus');
    }
}
