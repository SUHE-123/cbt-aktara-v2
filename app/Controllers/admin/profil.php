<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class profil extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('id'));

        return view('admin/profil', ['user' => $user]);
    }

    public function update()
    {
        $userModel = new UserModel();
        $id = session()->get('id');

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap')
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/profile/', $newName);
            $data['foto'] = $newName;

            $old = $userModel->find($id);
            if ($old && isset($old['foto']) && $old['foto'] != 'suhe formal.jpg') {
                @unlink('uploads/profile/' . $old['foto']);
            }

        }

        $userModel->update($id, $data);

        // Update session foto & nama_lengkap kalau ada yang baru
        if (isset($data['foto'])) {
            session()->set('foto', $data['foto']);
        }

        if (isset($data['nama_lengkap'])) {
            session()->set('nama_lengkap', $data['nama_lengkap']);
        }

        
        session()->setFlashdata('success', 'Profil berhasil diperbarui.');
        return redirect()->to('/admin/profil');
        
    }
}
