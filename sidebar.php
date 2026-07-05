<?php
declare(strict_types=1);

if (!defined('DASHBOARD_ACCESS')) {
    header('Location: dashboard.php');
    exit;
}
?>
<nav class="nav nav-pills p-2 bg-white shadow-sm rounded-3 mb-4 flex-nowrap overflow-x-auto" aria-label="Menu dashboard utama">
    <a class="nav-link <?= $page === 'home' ? 'active' : '' ?>" href="dashboard.php">
        <i class="bi bi-house-door me-1"></i>Dashboard
    </a>
    <a class="nav-link <?= strpos($page, 'berita') === 0 || $page === 'setup_db' ? 'active' : '' ?>" href="dashboard.php?page=berita">
        <i class="bi bi-newspaper me-1"></i>Kelola Berita
    </a>
    <a class="nav-link <?= $page === 'utama' ? 'active' : '' ?>" href="dashboard.php?page=utama">
        <i class="bi bi-speedometer2 me-1"></i>Dashboard Utama
    </a>
    <a class="nav-link <?= $page === 'form' ? 'active' : '' ?>" href="dashboard.php?page=form">
        <i class="bi bi-ui-checks-grid me-1"></i>Form
    </a>
    <a class="nav-link <?= $page === 'tabel' ? 'active' : '' ?>" href="dashboard.php?page=tabel">
        <i class="bi bi-table me-1"></i>Tabel
    </a>
    <a class="nav-link <?= $page === 'profil' ? 'active' : '' ?>" href="dashboard.php?page=profil">
        <i class="bi bi-person-circle me-1"></i>Profil
    </a>
    <a class="nav-link <?= $page === 'company_profile' ? 'active' : '' ?>" href="dashboard.php?page=company_profile">
        <i class="bi bi-building me-1"></i>Company Profile
    </a>
    <a class="nav-link text-danger ms-md-auto text-nowrap" href="logout.php">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
    </a>
</nav>
