<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{

    public function login()
    {
        return view('login');
    }

    public function prosesLogin()
    {
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && $user['password'] == $password) {

            session()->set([
                'id_user'   => $user['id_user'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);

            // redirect berdasarkan role
            if ($user['role'] == 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dashboard_mitra');
            }
        }

        return redirect()->to('/login')->with('error', 'Email atau Password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}