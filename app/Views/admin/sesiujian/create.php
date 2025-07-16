<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <div class="main-content w-100 p-4">
    <h4 class="mb-4">Tambah Sesi Ujian</h4>

    <form action="<?= base_url('/admin/sesiujian/store') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="sesi" class="form-label">Nama Sesi</label>
        <input type="text" name="sesi" id="sesi" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="kode" class="form-label">Kode Sesi</label>
        <input type="text" name="kode" id="kode" class="form-control" required>
      </div>

    <div class="mb-3">
        <label for="waktu_mulai">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu_selesai">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" class="form-control" required>
    </div>


      <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
      <a href="<?= base_url('/admin/sesiujian') ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
