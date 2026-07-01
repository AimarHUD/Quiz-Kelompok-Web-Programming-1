<?php require_once __DIR__ . '/../config/auth.php'; $user = currentUser(); ?>
<div class="d-lg-none mb-3">
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
        <i class="bi bi-list me-2"></i>Menu
    </button>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="list-group list-group-flush">
            <a href="<?php echo BASE_URL; ?>/dashboard/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-grid me-2"></i>Dashboard</a>
            <a href="<?php echo BASE_URL; ?>/dashboard/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-speedometer2 me-2"></i>Dashboard Utama</a>
            <a href="<?php echo BASE_URL; ?>/berita/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-newspaper me-2"></i>Kelola Berita</a>
            <a href="<?php echo BASE_URL; ?>/dashboard/form.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-ui-checks me-2"></i>Form</a>
            <a href="<?php echo BASE_URL; ?>/dashboard/tabel.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-table me-2"></i>Tabel</a>
            <a href="<?php echo BASE_URL; ?>/profile/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-person-circle me-2"></i>Profile</a>
            <a href="<?php echo BASE_URL; ?>/dashboard/company_profile.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-building me-2"></i>Company Profile</a>
            <?php if (($user['role'] ?? '') === 'Admin'): ?>
                <a href="#" class="list-group-item list-group-item-action border-0"><i class="bi bi-shield-lock me-2"></i>Admin Panel</a>
            <?php endif; ?>
            <a href="<?php echo BASE_URL; ?>/login/logout.php" class="list-group-item list-group-item-action border-0 text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
        </div>
    </div>
</div>

<div class="d-none d-lg-block sidebar-panel shadow-sm rounded-4 overflow-hidden">
    <div class="p-4 border-bottom bg-primary text-white">
        <h6 class="fw-bold mb-1">Admin Panel</h6>
        <small>CarWash Company</small>
    </div>
    <div class="list-group list-group-flush">
        <a href="<?php echo BASE_URL; ?>/dashboard/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-grid me-2"></i>Dashboard</a>
        <a href="<?php echo BASE_URL; ?>/dashboard/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-speedometer2 me-2"></i>Dashboard Utama</a>
        <a href="<?php echo BASE_URL; ?>/berita/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-newspaper me-2"></i>Kelola Berita</a>
        <a href="<?php echo BASE_URL; ?>/dashboard/form.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-ui-checks me-2"></i>Form</a>
        <a href="<?php echo BASE_URL; ?>/dashboard/tabel.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-table me-2"></i>Tabel</a>
        <a href="<?php echo BASE_URL; ?>/profile/index.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-person-circle me-2"></i>Profile</a>
        <a href="<?php echo BASE_URL; ?>/dashboard/company_profile.php" class="list-group-item list-group-item-action border-0"><i class="bi bi-building me-2"></i>Company Profile</a>
        <?php if (($user['role'] ?? '') === 'Admin'): ?>
            <a href="#" class="list-group-item list-group-item-action border-0"><i class="bi bi-shield-lock me-2"></i>Admin Panel</a>
        <?php endif; ?>
        <a href="<?php echo BASE_URL; ?>/login/logout.php" class="list-group-item list-group-item-action border-0 text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
    </div>
</div>
