<div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; min-height: 100vh;">
    
    <!-- Profil Admin -->
    <div class="text-center mb-4">
        <img src="<?= base_url('uploads/profile/' . (session()->get('foto') ?? 'suhe formal.jpg')) ?>"
             alt="Foto Admin" class="rounded-circle border mb-2" style="width: 80px; height: 80px; object-fit: cover;">
        
        <h5 class="mb-1"><?= esc(session()->get('nama_lengkap') ?? 'Admin CBT') ?></h5>

        <?php if (session()->get('email')): ?>
            <p class="mb-1 text-white-50 small">
                <i class="bi bi-envelope"></i> <?= esc(session()->get('email')) ?>
            </p>
        <?php endif; ?>

        <?php if (session()->get('no_hp')): ?>
            <p class="mb-2 text-white-50 small">
                <i class="bi bi-telephone"></i> <?= esc(session()->get('no_hp')) ?>
            </p>
        <?php endif; ?>

        <a href="<?= base_url('/admin/profil') ?>" class="btn btn-sm btn-outline-light mt-2">
            <i class="bi bi-person-circle"></i> Edit Profil
        </a>
    </div>

    <hr class="border-secondary">

    <!-- Menu Navigasi -->
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= base_url('/admin/dashboard') ?>" class="nav-link text-white">
                <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="<?= base_url('/admin/data-umum') ?>" class="nav-link text-white">
                <i class="bi bi-folder me-1"></i> Data Umum
            </a>
        </li>
        <li>
            <a href="<?= base_url('/admin/data-ujian') ?>" class="nav-link text-white">
                <i class="bi bi-journal-text me-1"></i> Data Ujian
            </a>
        </li>
        <li>
            <a href="<?= base_url('/admin/pelaksanaan') ?>" class="nav-link text-white">
                <i class="bi bi-play-circle me-1"></i> Pelaksanaan
            </a>
        </li>
        <li>
            <a href="<?= base_url('/admin/perpustakaan') ?>" class="nav-link text-white">
                <i class="bi bi-book me-1"></i> Perpustakaan
            </a>
        </li>
        <li>
            <a href="<?= base_url('/admin/user-management') ?>" class="nav-link text-white">
                <i class="bi bi-people me-1"></i> User Management
            </a>
        </li>
    </ul>
</div>
<!-- Toggle sidebar dan footer -->
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
