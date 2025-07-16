<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <div class="main-content w-100 p-4">
    <h4 class="mb-4">Edit Sesi Ujian</h4>

    <form action="<?= base_url('/admin/sesiujian/update/' . $sesi['id_sesi']) ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="sesi" class="form-label">Nama Sesi</label>
        <input type="text" name="sesi" id="sesi" value="<?= esc($sesi['sesi']) ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="kode" class="form-label">Kode Sesi</label>
        <input type="text" name="kode" id="kode" value="<?= esc($sesi['kode']) ?>" class="form-control" required>
      </div>

    <div class="mb-3">
        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" class="form-control" value="<?= esc($sesi['waktu_mulai']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" class="form-control" value="<?= esc($sesi['waktu_selesai']) ?>" required>
    </div>

      <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
      <a href="<?= base_url('/admin/sesiujian') ?>" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
