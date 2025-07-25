<?= $this->include('layout/header') ?>

<style>
  .sekolah-create-wrapper {
    position: relative;
    background: url('<?= base_url('assets/img/backround3.jpg') ?>') no-repeat center center;
    background-size: cover;
    min-height: 100vh;
    overflow-x: hidden;
  }

  .sekolah-create-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(8px);
    z-index: 1;
  }

  .sekolah-create-container {
    position: relative;
    z-index: 2;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 2rem;
    margin: 2rem;
    border-radius: 8px;
  }
</style>

<div class="d-flex sekolah-create-wrapper">
  <!-- Sidebar -->
  <?= $this->include('layout/sidebar2') ?>

  <!-- Main Content -->
  <div class="main-content flex-grow-1 d-flex flex-column">
    <!-- Overlay -->
    <div class="sekolah-create-overlay"></div>

    <!-- Header -->
    <div class="navbar-dashboard d-flex justify-content-between align-items-center px-4 py-3 bg-dark text-white shadow-sm z-3">
      <button class="btn btn-outline-light me-3" id="toggleSidebar">
        <i class="bi bi-list"></i>
      </button>
      <h4 class="mb-0"><strong>Tambah Sesi Ujian</strong></h4>
      <div>
        <?= esc(session('nama_lengkap')) ?> |
        <a href="<?= base_url('logout') ?>" class="text-white ms-2">Logout</a>
      </div>
    </div>


    <div class="sekolah-create-container shadow">
      <form action="<?= base_url('/guru/sesiujian/store') ?>" method="post">
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
        <a href="<?= base_url('/guru/sesiujian') ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>

    </div>
    