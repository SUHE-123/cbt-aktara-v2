<?= $this->include('layout/header') ?>

<style>
  .siswa-create-wrapper {
    position: relative;
    background: url('<?= base_url('assets/img/joggun4.jpg') ?>') no-repeat center center;
    background-size: cover;
    min-height: 100vh;
    overflow-x: hidden;
  }

  .siswa-create-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(8px);
    z-index: 1;
  }

  .siswa-create-content {
    position: relative;
    z-index: 2;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 2rem;
    margin: 2rem;
    border-radius: 8px;
  }
</style>

<div class="d-flex siswa-create-wrapper">
  <!-- Sidebar -->
  <?= $this->include('layout/sidebar') ?>

  <!-- Overlay -->
  <div class="siswa-create-overlay"></div>

  <!-- Main Content -->
  <div class="main-content flex-grow-1 d-flex flex-column">

    <!-- Header -->
    <div class="navbar-dashboard d-flex justify-content-between align-items-center px-4 py-3 bg-dark text-white shadow-sm z-3">
      <button class="btn btn-outline-light me-3" id="toggleSidebar">
        <i class="bi bi-list"></i>
      </button>
      <h4 class="mb-0"><strong>Tambah Data Siswa</strong></h4>
      <div>
        <?= esc(session('nama_lengkap')) ?> |
        <a href="<?= base_url('logout') ?>" class="text-white ms-2">Logout</a>
      </div>
    </div>

    <!-- Form Content -->
    <div class="siswa-create-content shadow">
      <form action="<?= base_url('/admin/siswa/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
              <option value="">-- Pilih --</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" required>
          </div>
          <div class="col-md-4">
            <label for="status_akun" class="form-label">Status Akun</label>
            <select name="status_akun" class="form-select" required>
              <option value="aktif" selected>Aktif</option>
              <option value="nonaktif">Nonaktif</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" class="form-control" rows="2"></textarea>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
        </div>

        <div class="mb-4">
          <label for="sekolah_id" class="form-label">Asal Sekolah</label>
          <select name="sekolah_id" class="form-select">
            <option value="">-- Pilih Sekolah --</option>
            <?php foreach ($sekolah as $s): ?>
              <option value="<?= $s['id'] ?>"><?= esc($s['nama_sekolah']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
        <a href="<?= base_url('/admin/siswa') ?>" class="btn btn-secondary ms-2">Kembali</a>
      </form>
    </div>
  </div>
</div>


