<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BankSoalModel;
use App\Models\MapelModel;

class banksoal extends BaseController
{
    protected $bankSoalModel;
    protected $mapelModel;

    public function __construct()
    {
        $this->bankSoalModel = new BankSoalModel();
        $this->mapelModel    = new MapelModel();
    }

    public function index()
    {
        $data['bank'] = $this->bankSoalModel
            ->select('bank_soal.*, mata_pelajaran.nama_mapel')
            ->join('mata_pelajaran', 'mata_pelajaran.id = bank_soal.id_mapel', 'left')
            ->findAll();

        return view('admin/banksoal/index', $data);
    }

    public function create()
    {
        $data['mapel'] = $this->mapelModel->findAll();
        return view('admin/banksoal/create', $data);
    }

    public function store()
    {
        $this->bankSoalModel->insert([
            'bank_code'    => $this->request->getPost('bank_code'),
            'id_mapel'     => $this->request->getPost('id_mapel'),
            'jumlah_soal'  => $this->request->getPost('jumlah_soal'),
        ]);

        return redirect()->to('/admin/banksoal')->with('success', 'Bank soal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['bank']  = $this->bankSoalModel->find($id);
        $data['mapel'] = $this->mapelModel->findAll();
        return view('admin/banksoal/edit', $data);
    }

    public function update($id)
    {
        $this->bankSoalModel->update($id, [
            'bank_code'    => $this->request->getPost('bank_code'),
            'id_mapel'     => $this->request->getPost('id_mapel'),
            'jumlah_soal'  => $this->request->getPost('jumlah_soal'),
        ]);

        return redirect()->to('/admin/banksoal')->with('success', 'Bank soal berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->bankSoalModel->delete($id);
        return redirect()->to('/admin/banksoal')->with('success', 'Bank soal berhasil dihapus.');
    }
}
