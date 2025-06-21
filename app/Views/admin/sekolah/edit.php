<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <div class="main-content w-100 p-4">
    <h4>Edit Data Sekolah</h4>
    <form action="<?= base_url('/admin/sekolah/update/' . $sekolah['id']) ?>" method="post">
      <?= csrf_field() ?>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>NPSN</label>
          <input type="text" name="npsn" class="form-control" value="<?= esc($sekolah['npsn']) ?>" required>
        </div>
        <div class="col-md-6">
          <label>Nama Sekolah</label>
          <input type="text" name="nama_sekolah" class="form-control" value="<?= esc($sekolah['nama_sekolah']) ?>" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Jenjang</label>
          <input type="text" name="jenjang" class="form-control" value="<?= esc($sekolah['jenjang']) ?>" required>
        </div>
        <div class="col-md-6">
          <label>Status</label>
          <select name="status" class="form-control" required>
            <option value="Negeri" <?= $sekolah['status'] == 'Negeri' ? 'selected' : '' ?>>Negeri</option>
            <option value="Swasta" <?= $sekolah['status'] == 'Swasta' ? 'selected' : '' ?>>Swasta</option>
          </select>
        </div>
      </div>

      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"><?= esc($sekolah['alamat']) ?></textarea>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label>Desa/Kelurahan</label>
          <input type="text" name="desa_kelurahan" class="form-control" value="<?= esc($sekolah['desa_kelurahan']) ?>">
        </div>
        <div class="col-md-4">
          <label>Kecamatan</label>
          <input type="text" name="kecamatan" class="form-control" value="<?= esc($sekolah['kecamatan']) ?>">
        </div>
        <div class="col-md-4">
          <label>Kab/Kota</label>
          <input type="text" name="kab_kota" class="form-control" value="<?= esc($sekolah['kab_kota']) ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Provinsi</label>
          <input type="text" name="provinsi" class="form-control" value="<?= esc($sekolah['provinsi']) ?>">
        </div>
        <div class="col-md-6">
          <label>Kode Pos</label>
          <input type="text" name="kode_pos" class="form-control" value="<?= esc($sekolah['kode_pos']) ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label>Kontak</label>
          <input type="text" name="kontak" class="form-control" value="<?= esc($sekolah['kontak']) ?>">
        </div>
        <div class="col-md-6">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?= esc($sekolah['email']) ?>">
        </div>
      </div>

      <div class="mb-4">
        <label>Kepala Sekolah</label>
        <input type="text" name="kepala_sekolah" class="form-control" value="<?= esc($sekolah['kepala_sekolah']) ?>">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?= base_url('/admin/sekolah') ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

<?= $this->include('layout/footer') ?>
