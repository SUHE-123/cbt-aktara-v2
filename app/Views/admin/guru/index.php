<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh; overflow-x: hidden;">
  <!-- Sidebar -->
  <?= $this->include('layout/sidebar') ?>

  <!-- Main Content -->
  <div class="main-content flex-grow-1 d-flex flex-column">
    
    <!-- Header Khusus Halaman -->
    <div class="navbar-dashboard d-flex justify-content-between align-items-center px-4 py-3 bg-dark text-white shadow-sm">
    <button class="btn btn-outline-light me-3" id="toggleSidebar">
        <i class="bi bi-list"></i>
      </button>
      <h4 class="mb-0"><strong>Data Guru</strong></h4>
      
      <div>
        <?= esc(session('nama_lengkap')) ?> |
        <a href="<?= base_url('logout') ?>" class="text-white ms-2">Logout</a>
      </div>
    </div>

    <!-- Konten -->
    
    <div class="flex-grow-1 px-4 py-3">
    <a href="<?= base_url('/admin/guru/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Guru
      </a>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
          <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>
      <div class="table-responsive">
      <table class="table table-striped table-bordered" id="guruTable">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIP</th>
            <th>Username</th>
            <th>Jenis Kelamin</th>
            <th>Mata Pelajaran</th>
            <th>Status</th>
            <th>Sekolah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($guru as $g): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($g['nama_lengkap']) ?></td>
              <td><?= esc($g['nip']) ?></td>
              <td><?= esc($g['username']) ?></td>
              <td><?= esc($g['jenis_kelamin']) ?></td>
              <td><?= esc($g['mata_pelajaran']) ?></td>
              <td>
                <?php if ($g['status_akun'] === 'aktif'): ?>
                  <span class="badge bg-success">Aktif</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Nonaktif</span>
                <?php endif; ?>
              </td>
              <td><?= esc($g['sekolah_id']) ?></td> <!-- akan diganti dengan relasi nama sekolah nanti -->
              <td>
                <a href="<?= base_url('admin/guru/edit/' . $g['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="<?= base_url('admin/guru/delete/' . $g['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus guru ini?');">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#guruTable').DataTable();
  });
</script>
