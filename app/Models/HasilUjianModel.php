<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilUjianModel extends Model
{
    protected $table = 'hasil_ujian';
    protected $primaryKey = 'id_hasil';
    protected $allowedFields = ['id_status_ujian', 'id_analisa', 'id_soal'];

    public function getHasilUjianLengkap()
    {
        return $this->select('
                hasil_ujian.*,
                status_ujian.id_jadwal,
                status_ujian.id_peserta,
                analisa_soal.jawaban_siswa,
                soal.soal,
                soal.jawaban as kunci_jawaban,
                siswa.nama_lengkap,
                siswa.kelas,
                sekolah.nama_sekolah
            ')
            ->join('status_ujian', 'status_ujian.id_status_ujian = hasil_ujian.id_status_ujian')
            ->join('analisa_soal', 'analisa_soal.id_analisa = hasil_ujian.id_analisa')
            ->join('soal', 'soal.id_soal = hasil_ujian.id_soal')
            ->join('siswa', 'siswa.id = status_ujian.id_peserta')
            ->join('sekolah', 'sekolah.id = siswa.sekolah_id')
            ->orderBy('siswa.kelas')
            ->orderBy('siswa.nama_lengkap')
            ->findAll();
    }

    public function getByStatusUjian($id_status_ujian)
    {
        return $this->where('hasil_ujian.id_status_ujian', $id_status_ujian)
            ->join('analisa_soal', 'analisa_soal.id_analisa = hasil_ujian.id_analisa')
            ->join('soal', 'soal.id_soal = hasil_ujian.id_soal')
            ->findAll();
    }

    public function getByKelas($kelas)
    {
        return $this->select('
                hasil_ujian.*, siswa.nama_lengkap, siswa.kelas,
                sekolah.nama_sekolah,
                soal.soal, soal.jawaban as kunci_jawaban,
                analisa_soal.jawaban_siswa
            ')
            ->join('status_ujian', 'status_ujian.id_status_ujian = hasil_ujian.id_status_ujian')
            ->join('siswa', 'siswa.id = status_ujian.id_peserta')
            ->join('sekolah', 'sekolah.id = siswa.sekolah_id')
            ->join('soal', 'soal.id_soal = hasil_ujian.id_soal')
            ->join('analisa_soal', 'analisa_soal.id_analisa = hasil_ujian.id_analisa')
            ->where('siswa.kelas', $kelas)
            ->findAll();
    }

    public function getBySekolah($id_sekolah)
    {
        return $this->select('
                hasil_ujian.*, siswa.nama_lengkap, siswa.kelas,
                sekolah.nama_sekolah,
                soal.soal, soal.jawaban as kunci_jawaban,
                analisa_soal.jawaban_siswa
            ')
            ->join('status_ujian', 'status_ujian.id_status_ujian = hasil_ujian.id_status_ujian')
            ->join('siswa', 'siswa.id = status_ujian.id_peserta')
            ->join('sekolah', 'sekolah.id = siswa.sekolah_id')
            ->join('soal', 'soal.id_soal = hasil_ujian.id_soal')
            ->join('analisa_soal', 'analisa_soal.id_analisa = hasil_ujian.id_analisa')
            ->where('sekolah.id', $id_sekolah)
            ->findAll();
    }

    public function getBySiswa($id_siswa)
    {
        return $this->select('
                hasil_ujian.*, siswa.nama_lengkap, siswa.kelas,
                sekolah.nama_sekolah,
                soal.soal, soal.jawaban as kunci_jawaban,
                analisa_soal.jawaban_siswa
            ')
            ->join('status_ujian', 'status_ujian.id_status_ujian = hasil_ujian.id_status_ujian')
            ->join('siswa', 'siswa.id = status_ujian.id_peserta')
            ->join('sekolah', 'sekolah.id = siswa.sekolah_id')
            ->join('soal', 'soal.id_soal = hasil_ujian.id_soal')
            ->join('analisa_soal', 'analisa_soal.id_analisa = hasil_ujian.id_analisa')
            ->where('siswa.id', $id_siswa)
            ->findAll();
    }
}
