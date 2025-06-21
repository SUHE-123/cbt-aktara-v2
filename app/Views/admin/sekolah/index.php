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
      <h4 class="mb-0"><strong>Data Sekolah</strong></h4>
      
      <div>
        <?= esc(session('nama_lengkap')) ?> |
        <a href="<?= base_url('logout') ?>" class="text-white ms-2">Logout</a>
      </div>
    </div>

    <!-- Konten -->
    
    <div class="flex-grow-1 px-4 py-3">
    <a href="<?= base_url('/admin/sekolah/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Sekolah
      </a>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
          <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="sekolahTable">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Nama Sekolah</th>
              <th>NPSN</th>
              <th>Jenjang</th>
              <th>Status</th>
              <th>Alamat</th>
              <th>Kontak</th>
              <th>Kepala Sekolah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($sekolah as $s): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($s['nama_sekolah']) ?></td>
                <td><?= esc($s['npsn']) ?></td>
                <td><?= esc($s['jenjang']) ?></td>
                <td><?= esc($s['status']) ?></td>
                <td><?= esc($s['alamat']) ?>, <?= esc($s['desa_kelurahan']) ?>, <?= esc($s['kecamatan']) ?>, <?= esc($s['kab_kota']) ?>, <?= esc($s['provinsi']) ?></td>
                <td><?= esc($s['kontak']) ?><br><?= esc($s['email']) ?></td>
                <td><?= esc($s['kepala_sekolah']) ?></td>
                <td>
                  <a href="<?= base_url('admin/sekolah/edit/' . $s['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                  <form action="<?= base_url('admin/sekolah/delete/' . $s['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
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

    <!-- Footer -->

  </div>
</div>

<!-- DataTables & Bootstrap JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#sekolahTable').DataTable();
  });
</script>
