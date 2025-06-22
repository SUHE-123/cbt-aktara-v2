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
      <h4 class="mb-0"><strong>Data Siswa</strong></h4>
      
      <div>
        <?= esc(session('nama_lengkap')) ?> |
        <a href="<?= base_url('logout') ?>" class="text-white ms-2">Logout</a>
      </div>
    </div>

    <div class="flex-grow-1 px-4 py-3">
    <a href="<?= base_url('/admin/siswa/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Siswa
      </a>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
          <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>


    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="siswaTable">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIS</th>
            <th>Username</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Email</th>
            <th>Status Akun</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($siswa as $s): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($s['nama_lengkap']) ?></td>
              <td><?= esc($s['nis']) ?></td>
              <td><?= esc($s['username']) ?></td>
              <td><?= esc($s['jenis_kelamin']) === 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
              <td><?= esc($s['kelas']) ?></td>
              <td><?= esc($s['alamat']) ?></td>
              <td><?= esc($s['kontak']) ?></td>
              <td><?= esc($s['email']) ?></td>
              <td>
                <span class="badge bg-<?= $s['status_akun'] === 'aktif' ? 'success' : 'secondary' ?>">
                  <?= esc(ucfirst($s['status_akun'])) ?>
                </span>
              </td>
              <td>
                <a href="<?= base_url('admin/siswa/edit/' . $s['id']) ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                <form action="<?= base_url('admin/siswa/delete/' . $s['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
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

<!-- DataTables CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function () {
    $('#siswaTable').DataTable({
      responsive: true,
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        paginate: {
          previous: "Sebelumnya",
          next: "Berikutnya"
        }
      }
    });
  });
</script>

