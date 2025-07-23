<?php
$uri = service('uri');
$segment2 = $uri->getSegment(2);
?>

<div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark shadow-sm" style="width: 250px;">
    <!-- Profil Guru -->
    <div class="text-center mb-4">
        <img src="<?= base_url('uploads/profile/' . (session()->get('foto') ?? 'default.png')) ?>" alt="Foto Guru" class="rounded-circle border mb-2" style="width: 80px; height: 80px; object-fit: cover;">
        <h5 class="mb-1"><?= esc(session()->get('nama_lengkap') ?? 'Guru CBT') ?></h5>
        <?php if (session()->get('email')): ?>
            <p class="mb-1 text-muted small"><i class="bi bi-envelope"></i> <?= esc(session()->get('email')) ?></p>
        <?php endif; ?>
        <?php if (session()->get('no_hp')): ?>
            <p class="mb-2 text-muted small"><i class="bi bi-telephone"></i> <?= esc(session()->get('no_hp')) ?></p>
        <?php endif; ?>
        <a href="<?= base_url('/guru/profil') ?>" class="btn btn-sm btn-outline-light mt-2"><i class="bi bi-person-circle"></i> Edit Profil</a>
    </div>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= base_url('/guru/dashboard') ?>" class="nav-link fw-bold <?= $segment2 == 'dashboard' ? 'active bg-white text-dark' : 'text-white' ?>">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <!-- Tambahkan menu lain khusus guru di sini -->
        <!-- Misal nanti: Soal Saya, Hasil Ujian, Analisa Ujian, dll -->

    </ul>
</div>

<!-- Bootstrap (pastikan sudah include JS Bootstrap 5) -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');
    const footer = document.getElementById('mainFooter');

    toggleBtn?.addEventListener('click', () => {
      sidebar?.classList.toggle('hidden');
      mainContent?.classList.toggle('full');
      footer?.classList.toggle('full-footer');
    });
  });
</script>
