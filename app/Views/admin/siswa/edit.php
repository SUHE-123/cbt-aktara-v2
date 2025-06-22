<?= $this->include('layout/header') ?>
<div class="d-flex" style="min-height: 100vh;">
  <!-- Sidebar -->
  <?= $this->include('layout/sidebar') ?>

  <!-- Main Content -->
  <div class="main-content w-100 p-4">
    <h4 class="mb-4">Edit Data Siswa</h4>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/admin/siswa/update/' . $siswa['id']) ?>" method="post">
      <?= csrf_field() ?>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" value="<?= esc($siswa['nama_lengkap']) ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">NIS</label>
          <input type="text" name="nis" class="form-control" value="<?= esc($siswa['nis']) ?>" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" value="<?= esc($siswa['username']) ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Password (kosongkan jika tidak diubah)</label>
          <input type="password" name="password" class="form-control">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label class="form-label">Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-select" required>
            <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Kelas</label>
          <input type="text" name="kelas" class="form-control" value="<?= esc($siswa['kelas']) ?>" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Status Akun</label>
          <select name="status_akun" class="form-select" required>
            <option value="aktif" <?= $siswa['status_akun'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="nonaktif" <?= $siswa['status_akun'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
          </select>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control"><?= esc($siswa['alamat']) ?></textarea>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Kontak</label>
          <input type="text" name="kontak" class="form-control" value="<?= esc($siswa['kontak']) ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="<?= esc($siswa['email']) ?>">
        </div>
      </div>

      <div class="mb-4">
        <label class="form-label">Asal Sekolah</label>
        <select name="sekolah_id" class="form-select">
          <option value="">-- Pilih Sekolah --</option>
          <?php foreach ($sekolah as $s): ?>
            <option value="<?= $s['id'] ?>" <?= $siswa['sekolah_id'] == $s['id'] ? 'selected' : '' ?>>
              <?= esc($s['nama_sekolah']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
      <a href="<?= base_url('/admin/siswa') ?>" class="btn btn-secondary ms-2">Batal</a>
    </form>
  </div>
</div>
<?= $this->include('layout/footer') ?>
