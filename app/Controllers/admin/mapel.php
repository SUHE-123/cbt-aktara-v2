<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MapelModel;

class Mapel extends BaseController
{
    protected $mapelModel;

    public function __construct()
    {
        $this->mapelModel = new MapelModel();
    }

    // Tampilkan semua mata pelajaran
    public function index()
    {
        $data['mapel'] = $this->mapelModel->findAll();
        return view('admin/mapel/index', $data);
    }

    // Form tambah mata pelajaran
    public function create()
    {
        return view('admin/mapel/create');
    }

    // Proses simpan mata pelajaran
    public function store()
    {
        $this->mapelModel->insert([
            'nama_mapel'  => $this->request->getPost('nama_mapel'),
            'kode_mapel'  => $this->request->getPost('kode_mapel'),
            'jenjang'     => $this->request->getPost('jenjang'),
            'jurusan'     => $this->request->getPost('jurusan'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/mapel')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $data['mapel'] = $this->mapelModel->find($id);
        return view('admin/mapel/edit', $data);
    }

    // Proses update
    public function update($id)
    {
        $this->mapelModel->update($id, [
            'nama_mapel'  => $this->request->getPost('nama_mapel'),
            'kode_mapel'  => $this->request->getPost('kode_mapel'),
            'jenjang'     => $this->request->getPost('jenjang'),
            'jurusan'     => $this->request->getPost('jurusan'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/mapel')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    // Proses hapus
    public function delete($id)
    {
        $this->mapelModel->delete($id);
        return redirect()->to('/admin/mapel')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
