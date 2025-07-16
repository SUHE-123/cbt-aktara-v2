<?= $this->include('layout/header') ?>

<style>
  .guru-edit-wrapper {
    position: relative;
    background: url('<?= base_url('assets/img/backround3.jpg') ?>') no-repeat center center;
    background-size: cover;
    min-height: 100vh;
    overflow-x: hidden;
  }

  .guru-edit-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(8px);
    z-index: 1;
  }

  .guru-edit-container {
    position: relative;
    z-index: 2;
    padding: 2rem;
    border-radius: 8px;
    background-color: rgba(255, 255, 255, 0.9);
    margin: 2rem;
  }
</style>

<div class="d-flex guru-edit-wrapper">
  <!-- Sidebar -->
  <?= $this->include('layout/sidebar') ?>

  <!-- Main Content -->
  <div class="main-content flex-grow-1 d-flex flex-column">
    <div class="guru-edit-overlay"></div>

    <!-- Header Halaman -->
    <div class="navbar-dashboard d-flex justify-content-between align-items-center px-4 py-3 bg-dark text-white shadow-sm z-3">
      <button class="btn btn-outline-light me-3" id="toggleSidebar">
        <i class="bi bi-list"></i>
      </button>
      <h4 class="mb-0"><strong>Edit Data Bank Soal</strong></h4>
      <div>
        <?= esc(session('nama_lengkap')) ?> |
        <a href="<?= base_url('logout') ?>" class="text-white ms-2">Logout</a>
      </div>
    </div>

    <!-- Form Edit -->
    <div class="guru-edit-container shadow">
        <form action="<?= base_url('/admin/banksoal/update/' . $bank['id_bank']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="bank_code" class="form-label">Kode Bank</label>
            <input type="text" name="bank_code" class="form-control" value="<?= esc($bank['bank_code']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_mapel" class="form-label">Mata Pelajaran</label>
            <select name="id_mapel" class="form-select" required>
            <option value="">-- Pilih Mapel --</option>
            <?php foreach ($mapel as $m): ?>
                <option value="<?= $m['id'] ?>" <?= $bank['id_mapel'] == $m['id'] ? 'selected' : '' ?>>
                <?= esc($m['nama_mapel']) ?>
                </option>
            <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_soal" class="form-label">Jumlah Soal</label>
            <input type="number" name="jumlah_soal" class="form-control" value="<?= esc($bank['jumlah_soal']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
        <a href="<?= base_url('/admin/banksoal') ?>" class="btn btn-secondary ms-2">Batal</a>
        </form>
    </div>
    </div> 
    </div>
