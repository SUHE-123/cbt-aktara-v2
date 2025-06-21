<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <div class="main-content w-100 p-4">
    <h4>Tambah Data Sekolah</h4>
    <form action="<?= base_url('/admin/sekolah/store') ?>" method="post">
      <?= csrf_field() ?>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>NPSN</label>
          <input type="text" name="npsn" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label>Nama Sekolah</label>
          <input type="text" name="nama_sekolah" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Jenjang</label>
          <input type="text" name="jenjang" class="form-control" placeholder="SD/SMP/SMA/SMK" required>
        </div>
        <div class="col-md-6">
          <label>Status</label>
          <select name="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <option value="Negeri">Negeri</option>
            <option value="Swasta">Swasta</option>
          </select>
        </div>
      </div>

      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label>Desa/Kelurahan</label>
          <input type="text" name="desa_kelurahan" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Kecamatan</label>
          <input type="text" name="kecamatan" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Kab/Kota</label>
          <input type="text" name="kab_kota" class="form-control">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Provinsi</label>
          <input type="text" name="provinsi" class="form-control">
        </div>
        <div class="col-md-6">
          <label>Kode Pos</label>
          <input type="text" name="kode_pos" class="form-control">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Kontak</label>
          <input type="text" name="kontak" class="form-control">
        </div>
        <div class="col-md-6">
          <label>Email</label>
          <input type="email" name="email" class="form-control">
        </div>
      </div>

      <div class="mb-4">
        <label>Kepala Sekolah</label>
        <input type="text" name="kepala_sekolah" class="form-control">
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= base_url('/admin/sekolah') ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

<?= $this->include('layout/footer') ?>
