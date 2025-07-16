<?= $this->include('layout/header') ?>

<style>
  .form-wrapper {
    position: relative;
    background: url('<?= base_url('assets/img/backround3.jpg') ?>') no-repeat center center;
    background-size: cover;
    min-height: 100vh;
    overflow-x: hidden;
  }

  .form-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(8px);
    z-index: 1;
  }

  .form-container {
    position: relative;
    z-index: 2;
    padding: 2rem;
    border-radius: 8px;
    background-color: rgba(255, 255, 255, 0.85);
  }
</style>

<div class="d-flex form-wrapper">
  <!-- Sidebar -->
  <?= $this->include('layout/sidebar') ?>

  <!-- Main Content -->
  <div class="main-content flex-grow-1 d-flex flex-column">
    <div class="form-overlay"></div>

    <!-- Header -->
    <div class="navbar-dashboard d-flex justify-content-between align-items-center px-4 py-3 bg-dark text-white shadow-sm z-3">
      <button class="btn btn-outline-light me-3" id="toggleSidebar">
        <i class="bi bi-list"></i>
      </button>
      <h4 class="mb-0"><strong>Tambah Data Bank Soal</strong></h4>
      <div>
        <?= esc(session('nama_lengkap')) ?> |
        <a href="<?= base_url('logout') ?>" class="text-white ms-2">Logout</a>
      </div>
    </div>

    <!-- Form Tambah Bank Soal -->
    <div class="container py-5 form-container mt-4 shadow">
        <form action="<?= base_url('/admin/banksoal/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="bank_code" class="form-label">Kode Bank</label>
            <input type="text" name="bank_code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_mapel" class="form-label">Mata Pelajaran</label>
            <select name="id_mapel" class="form-select">
            <option value="">-- Pilih Mapel --</option>
            <?php foreach ($mapel as $m): ?>
                <option value="<?= $m['id'] ?>"><?= esc($m['nama_mapel']) ?></option>
            <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_soal" class="form-label">Jumlah Soal</label>
            <input type="number" name="jumlah_soal" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
        <a href="<?= base_url('/admin/banksoal') ?>" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
    </div>
    </div>
