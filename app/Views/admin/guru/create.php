<?php // create.php ?>
<?= $this->include('layout/header') ?>
<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <div class="main-content w-100 p-4">
    <h4 class="mb-4">Tambah Data Guru</h4>

    <form action="<?= base_url('/admin/guru/store') ?>" method="post">
      <?= csrf_field() ?>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
          <label>NIP</label>
          <input type="text" name="nip" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label>Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label>Mata Pelajaran</label>
          <input type="text" name="mata_pelajaran" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
          <label>Status Akun</label>
          <select name="status_akun" class="form-select">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label>ID Sekolah</label>
          <input type="number" name="sekolah_id" class="form-control">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('/admin/guru') ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
<?= $this->include('layout/footer') ?>