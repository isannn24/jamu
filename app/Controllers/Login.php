<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function proses()
    {
        $db = \Config\Database::connect();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $db->table('user')
            ->where('username', $username)
            ->get()
            ->getRowArray();

        if (!$user) {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        if ($password != $user['password']) {
            return redirect()->back()->with('error', 'Password salah');
        }

        session()->set([
            'id_user'      => $user['id_user'],
            'username'     => $user['username'],
            'role'         => $user['role'],
            'id_franchise' => $user['id_franchise'],
            'logged_in'    => true
        ]);

        // redirect sesuai role
        switch ($user['role']) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'mitra':
                return redirect()->to('/mitra/dashboard');
            case 'owner':
                return redirect()->to('/owner/dashboard');
            default:
                return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}