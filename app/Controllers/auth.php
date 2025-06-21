<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && hash('sha256', $password) === $user['password']) {
            session()->set([
                'id'           => $user['id'],
                'username'     => $user['username'],
                'role'         => $user['role'],
                'nama_lengkap' => $user['nama_lengkap'],
                'foto'         => $user['foto'] ?? 'suhe formal.jpg', 
                'logged_in'    => true
            ]);
            
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
