<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table      = 'guru';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_lengkap', 'nip', 'username', 'password',
        'jenis_kelamin', 'mata_pelajaran', 'alamat',
        'kontak', 'email', 'status_akun', 'sekolah_id'
    ];
}
