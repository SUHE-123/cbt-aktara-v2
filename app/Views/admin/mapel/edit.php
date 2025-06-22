<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <!-- Main Content -->
  <div class="main-content w-100 p-4" style="backdrop-filter: blur(6px); background-color: rgba(255, 255, 255, 0.8); border-radius: 10px;">
    <h4 class="mb-4">Edit Mata Pelajaran</h4>

    <form action="<?= base_url('/admin/mapel/update/' . $mapel['id']) ?>" method="post">
      <?= csrf_field() ?>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
          <input type="text" name="nama_mapel" class="form-control" value="<?= esc($mapel['nama_mapel']) ?>" required>
        </div>
        <div class="col-md-6">
          <label for="kode_mapel" class="form-label">Kode Mapel</label>
          <input type="text" name="kode_mapel" class="form-control" value="<?= esc($mapel['kode_mapel']) ?>" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="jenjang" class="form-label">Jenjang</label>
          <select name="jenjang" class="form-select">
            <option value="">-- Pilih Jenjang --</option>
            <option value="SD" <?= $mapel['jenjang'] == 'SD' ? 'selected' : '' ?>>SD</option>
            <option value="SMP" <?= $mapel['jenjang'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
            <option value="SMA" <?= $mapel['jenjang'] == 'SMA' ? 'selected' : '' ?>>SMA</option>
            <option value="SMK" <?= $mapel['jenjang'] == 'SMK' ? 'selected' : '' ?>>SMK</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" name="jurusan" class="form-control" value="<?= esc($mapel['jurusan']) ?>">
        </div>
      </div>

      <div class="mb-4">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="aktif" <?= $mapel['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
          <option value="nonaktif" <?= $mapel['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
      <a href="<?= base_url('/admin/mapel') ?>" class="btn btn-secondary ms-2">Batal</a>
    </form>
  </div>
</div>

<?= $this->include('layout/footer') ?>
