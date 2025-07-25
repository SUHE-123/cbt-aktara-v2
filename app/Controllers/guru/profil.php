<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\UserModel;

class profil extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('id'));

        if (!$user) {
            return redirect()->to('/login')->with('error', 'User tidak ditemukan. Silakan login ulang.');
        }

        return view('guru/profil', ['user' => $user]);
    }

    public function update()
    {
        $userModel = new UserModel();
        $id = session()->get('id');

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email'        => $this->request->getPost('email'),
            'no_hp'        => $this->request->getPost('no_hp'),
        ];

        // Handle foto profil
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/profile/', $newName);
            $data['foto'] = $newName;

            // Hapus foto lama kalau bukan default
            $old = $userModel->find($id);
            if ($old && isset($old['foto']) && $old['foto'] !== 'suhe formal.jpg') {
                @unlink('uploads/profile/' . $old['foto']);
            }

            session()->set('foto', $newName);
        }

        // Handle password
        $passwordBaru = $this->request->getPost('password');
        if (!empty($passwordBaru)) {
            $data['password'] = hash('sha256', $passwordBaru);
        }

        $userModel->update($id, $data);

        session()->set('nama_lengkap', $data['nama_lengkap']);
        session()->setFlashdata('success', 'Profil berhasil diperbarui.');

        return redirect()->to('/guru/profil');
    }
}
