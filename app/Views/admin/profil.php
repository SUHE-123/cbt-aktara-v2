<?= $this->include('layout/header') ?>


<div class="container mt-4">
    <h4>Edit Profil Admin</h4>
    <a href="<?= base_url('/admin/dashboard') ?>" class="btn btn-secondary mb-4">
    &larr; Kembali
    </a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('/admin/profil/update') ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" 
                value="<?= esc($user['nama_lengkap'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label>Foto Saat Ini:</label><br>
            <img src="<?= base_url('uploads/profile/' . ($user['foto'] ?? 'default.png')) ?>" 
                 alt="Foto Profil" width="100" class="img-thumbnail">
        </div>

        <div class="mb-3">
            <label>Ganti Foto (Opsional)</label>
            <input type="file" name="foto" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

