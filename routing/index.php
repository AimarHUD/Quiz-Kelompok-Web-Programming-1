<?php
declare(strict_types=1);

if (!defined('DASHBOARD_ACCESS')) {
    header('Location: ../dashboard.php');
    exit;
}

if ($page === 'home') {
    ?>
    <div class="py-2">
        <h1 class="h3 mb-1 fw-bold">Selamat datang, <?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8'); ?>!</h1>
        <p class="text-secondary mb-4">Login sebagai: <?= htmlspecialchars($userEmail, ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="card border-0 bg-primary-subtle p-4 h-100">
                    <h3 class="h5 text-primary-emphasis fw-bold mb-2">Portal Berita</h3>
                    <p class="text-secondary mb-4">Tulis, perbarui, dan kelola artikel berita perusahaan Anda melalui sistem terpadu ini.</p>
                    <a href="dashboard.php?page=berita" class="btn btn-primary align-self-start">Mulai Kelola</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 bg-light p-4 h-100">
                    <h3 class="h5 fw-bold mb-2">Pintasan Internal</h3>
                    <p class="text-secondary">Akses cepat ke halaman internal Dashboard Utama, Form, Tabel, Profil, dan Company Profile.</p>
                    <div class="d-flex gap-2 mt-2 flex-wrap">
                        <a class="btn btn-sm btn-outline-secondary" href="dashboard.php?page=utama">Dashboard Utama</a>
                        <a class="btn btn-sm btn-outline-secondary" href="dashboard.php?page=form">Form</a>
                        <a class="btn btn-sm btn-outline-secondary" href="dashboard.php?page=tabel">Tabel</a>
                        <a class="btn btn-sm btn-outline-secondary" href="dashboard.php?page=profil">Profil</a>
                        <a class="btn btn-sm btn-outline-secondary" href="dashboard.php?page=company_profile">Company Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} elseif ($page === 'berita') {
    include __DIR__ . '/../berita/list.php';
} elseif ($page === 'berita_create') {
    include __DIR__ . '/../berita/create.php';
} elseif ($page === 'berita_edit') {
    include __DIR__ . '/../berita/edit.php';
} elseif ($page === 'berita_delete') {
    include __DIR__ . '/../berita/delete.php';
} elseif ($page === 'setup_db') {
    include __DIR__ . '/../berita/setup.php';
} elseif ($page === 'utama') {
    include __DIR__ . '/../dashboard_utama.php';
} elseif ($page === 'form') {
    include __DIR__ . '/../form.php';
} elseif ($page === 'tabel') {
    include __DIR__ . '/../tabel.php';
} elseif ($page === 'profil') {
    include __DIR__ . '/../profil.php';
} elseif ($page === 'company_profile') {
    include __DIR__ . '/../company_profile.php';
} else {
    echo '<div class="alert alert-danger">Halaman tidak ditemukan.</div>';
}
