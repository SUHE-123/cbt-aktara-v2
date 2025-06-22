<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <!-- Main Content -->
  <div class="main-content w-100 p-4" style="backdrop-filter: blur(6px); background-color: rgba(255, 255, 255, 0.8); border-radius: 10px;">
    <h4 class="mb-4">Tambah Mata Pelajaran</h4>

    <form action="<?= base_url('/admin/mapel/store') ?>" method="post">
      <?= csrf_field() ?>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
          <input type="text" name="nama_mapel" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="kode_mapel" class="form-label">Kode Mapel</label>
          <input type="text" name="kode_mapel" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="jenjang" class="form-label">Jenjang</label>
          <select name="jenjang" class="form-select">
            <option value="">-- Pilih Jenjang --</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMA</option>
            <option value="SMK">SMK</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="jurusan" class="form-label">Jurusan (jika ada)</label>
          <input type="text" name="jurusan" class="form-control" placeholder="Contoh: IPA, IPS, TKJ, AKL">
        </div>
      </div>

      <div class="mb-4">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="aktif" selected>Aktif</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
      <a href="<?= base_url('/admin/mapel') ?>" class="btn btn-secondary ms-2">Kembali</a>
    </form>
  </div>
</div>

<?= $this->include('layout/footer') ?>
