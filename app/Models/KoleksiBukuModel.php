<?php

namespace App\Models;

use CodeIgniter\Model;

class KoleksiBukuModel extends Model
{
    /**
     * Tabel & kunci utama
     */
    protected $table      = 'koleksi_buku';
    protected $primaryKey = 'id_buku';

    /**
     * Field yang boleh di–insert / update
     */
    protected $allowedFields = [
        'id_jenis_buku',  // FK ke tabel jenis_buku
        'judul',
        'deskripsi',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'file_pdf',
        'cover',
        'status',         // tampil | tidak tampil
    ];

    /**
     * Jika ingin otomatis created_at & updated_at
     */
    protected $useTimestamps = true;      // pastikan kolom created_at & updated_at ada
    protected $returnType    = 'array';

    /* --------------------------------------------------------------------------
     |  QUERY HELPER
     |---------------------------------------------------------------------------
     |  – getWithJenis()  : ambil koleksi + nama jenis bukunya (JOIN)
    ---------------------------------------------------------------------------*/
    public function getWithJenis()
    {
        return $this->select('koleksi_buku.*, jenis_buku.nama_jenis_buku')
                    ->join('jenis_buku', 'jenis_buku.id = koleksi_buku.id_jenis_buku', 'left');
    }
}
