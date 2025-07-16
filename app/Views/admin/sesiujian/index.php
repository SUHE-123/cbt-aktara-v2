<?= $this->include('layout/header') ?>

<div class="d-flex" style="min-height: 100vh;">
  <?= $this->include('layout/sidebar') ?>

  <div class="main-content w-100 p-4">
    <h4 class="mb-4">Data Sesi Ujian</h4>

    <a href="<?= base_url('/admin/sesiujian/create') ?>" class="btn btn-primary mb-3">
      <i class="bi bi-plus-circle"></i> Tambah Sesi
    </a>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="sesiTable">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama Sesi</th>
            <th>Kode</th>
            <th>Waktu (Menit)</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($sesi as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($row['sesi']) ?></td>
              <td><?= esc($row['kode']) ?></td>
              <td><?= esc($row['waktu_mulai']) ?> - <?= esc($row['waktu_selesai']) ?></td>
              <td>
                <a href="<?= base_url('/admin/sesiujian/edit/' . $row['id_sesi']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="<?= base_url('/admin/sesiujian/delete/' . $row['id_sesi']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus sesi ini?');">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
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
  $(function() {
    $('#sesiTable').DataTable({
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
