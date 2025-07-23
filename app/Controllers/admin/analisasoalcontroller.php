<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnalisaSoalModel;
use App\Models\JadwalUjianModel;

class analisasoalcontroller extends BaseController
{
    protected $analisaSoalModel;
    protected $jadwalUjianModel;

    public function __construct()
    {
        $this->analisaSoalModel = new AnalisaSoalModel();
        $this->jadwalUjianModel = new JadwalUjianModel();
    }

    public function index()
    {
        $jadwalDipilih = $this->request->getGet('jadwal');

        // Ambil daftar jadwal ujian
        $daftarJadwal = $this->jadwalUjianModel->findAll();

        // Ambil data analisa
        if ($jadwalDipilih && $jadwalDipilih !== 'all') {
            $analisa = $this->analisaSoalModel->getByJadwal($jadwalDipilih);
        } else {
            $analisa = $this->analisaSoalModel->getAnalisaLengkap();
        }

        return view('admin/analisasoal/index', [
            'analisa' => $analisa,
            'daftarJadwal' => $daftarJadwal,
            'jadwalDipilih' => $jadwalDipilih
        ]);
    }
}
