<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SekolahModel;

class sekolah extends BaseController
{
    protected $sekolahModel;

    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
    }

    public function index()
    {
        $data['sekolah'] = $this->sekolahModel->findAll();
        return view('admin/sekolah/index', $data);
    }

    public function create()
    {
        return view('admin/sekolah/create');
    }

    public function store()
    {
        $this->sekolahModel->save([
            'npsn'            => $this->request->getPost('npsn'),
            'nama_sekolah'    => $this->request->getPost('nama_sekolah'),
            'jenjang'         => $this->request->getPost('jenjang'),
            'status'          => $this->request->getPost('status'),
            'alamat'          => $this->request->getPost('alamat'),
            'desa_kelurahan'  => $this->request->getPost('desa_kelurahan'),
            'kecamatan'       => $this->request->getPost('kecamatan'),
            'kab_kota'        => $this->request->getPost('kab_kota'),
            'provinsi'        => $this->request->getPost('provinsi'),
            'kode_pos'        => $this->request->getPost('kode_pos'),
            'kontak'          => $this->request->getPost('kontak'),
            'email'           => $this->request->getPost('email'),
            'kepala_sekolah'  => $this->request->getPost('kepala_sekolah'),
        ]);

        return redirect()->to('/admin/sekolah')->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['sekolah'] = $this->sekolahModel->find($id);
        return view('admin/sekolah/edit', $data);
    }

    public function update($id)
    {
        $this->sekolahModel->update($id, [
            'npsn'            => $this->request->getPost('npsn'),
            'nama_sekolah'    => $this->request->getPost('nama_sekolah'),
            'jenjang'         => $this->request->getPost('jenjang'),
            'status'          => $this->request->getPost('status'),
            'alamat'          => $this->request->getPost('alamat'),
            'desa_kelurahan'  => $this->request->getPost('desa_kelurahan'),
            'kecamatan'       => $this->request->getPost('kecamatan'),
            'kab_kota'        => $this->request->getPost('kab_kota'),
            'provinsi'        => $this->request->getPost('provinsi'),
            'kode_pos'        => $this->request->getPost('kode_pos'),
            'kontak'          => $this->request->getPost('kontak'),
            'email'           => $this->request->getPost('email'),
            'kepala_sekolah'  => $this->request->getPost('kepala_sekolah'),
        ]);

        return redirect()->to('/admin/sekolah')->with('success', 'Data sekolah berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->sekolahModel->delete($id);
        return redirect()->to('/admin/sekolah')->with('success', 'Data sekolah berhasil dihapus.');
    }
}
