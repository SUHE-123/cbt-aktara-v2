<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalisaSoalModel extends Model
{
    protected $table            = 'analisa_soal';
    protected $primaryKey       = 'id_analisa';
    protected $allowedFields    = ['id_jadwal', 'id_nomor', 'id_soal', 'jawaban_siswa'];

    public function getAnalisaLengkap()
    {
        return $this->select('
                    analisa_soal.*,
                    jadwal_ujian.id_jenis_ujian,
                    nomor_peserta.nomor_peserta,
                    siswa.nama_lengkap AS nama_siswa,
                    soal.soal,
                    soal.jawaban AS kunci_jawaban
                ')
                ->join('jadwal_ujian', 'jadwal_ujian.id_jadwal = analisa_soal.id_jadwal')
                ->join('nomor_peserta', 'nomor_peserta.id_peserta = analisa_soal.id_nomor')
                ->join('siswa', 'siswa.id = nomor_peserta.id_siswa')
                ->join('soal', 'soal.id_soal = analisa_soal.id_soal')
                ->orderBy('analisa_soal.id_analisa', 'ASC')
                ->findAll();
    }

    public function getByJadwal($id_jadwal)
    {
        return $this->select('
                    analisa_soal.*,
                    jadwal_ujian.id_jenis_ujian,
                    nomor_peserta.nomor_peserta,
                    siswa.nama_lengkap AS nama_siswa,
                    soal.soal,
                    soal.jawaban AS kunci_jawaban
                ')
                ->join('jadwal_ujian', 'jadwal_ujian.id_jadwal = analisa_soal.id_jadwal')
                ->join('nomor_peserta', 'nomor_peserta.id_peserta = analisa_soal.id_nomor')
                ->join('siswa', 'siswa.id = nomor_peserta.id_siswa')
                ->join('soal', 'soal.id_soal = analisa_soal.id_soal')
                ->where('analisa_soal.id_jadwal', $id_jadwal)
                ->orderBy('analisa_soal.id_analisa', 'ASC')
                ->findAll();
    }
}
