<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\SekolahModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data['siswa'] = $this->siswaModel->findAll();
        return view('admin/siswa/index', $data);
    }

    public function create()
    {
        $data['sekolah'] = (new SekolahModel())->findAll();
        return view('admin/siswa/create', $data);
    }

    public function store()
    {
        $this->siswaModel->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nis' => $this->request->getPost('nis'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kelas' => $this->request->getPost('kelas'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak'),
            'email' => $this->request->getPost('email'),
            'status_akun' => $this->request->getPost('status_akun'),
            'sekolah_id' => $this->request->getPost('sekolah_id')
        ]);

        return redirect()->to('/admin/siswa')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->find($id);
        $data['sekolah'] = (new SekolahModel())->findAll();
        return view('admin/siswa/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nis' => $this->request->getPost('nis'),
            'username' => $this->request->getPost('username'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kelas' => $this->request->getPost('kelas'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak'),
            'email' => $this->request->getPost('email'),
            'status_akun' => $this->request->getPost('status_akun'),
            'sekolah_id' => $this->request->getPost('sekolah_id')
        ];

        // Jika password diisi, update juga
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->siswaModel->update($id, $data);
        return redirect()->to('/admin/siswa')->with('success', 'Data siswa berhasil diubah.');
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        return redirect()->to('/admin/siswa')->with('success', 'Siswa berhasil dihapus.');
    }
}
