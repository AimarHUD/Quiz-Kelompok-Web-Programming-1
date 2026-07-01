<?php
declare(strict_types=1);

if (!defined('DASHBOARD_ACCESS')) {
    header('Location: dashboard.php');
    exit;
}
?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
    <div>
        <h2 class="h4 mb-1 fw-bold text-dark"><i class="bi bi-speedometer2 me-2 text-primary"></i>Dashboard Utama</h2>
        <p class="text-secondary mb-0">Ringkasan operasional internal dan statistik cepat.</p>
    </div>
    <span class="badge bg-success text-uppercase py-2 px-3">Aktif</span>
</div>
<div class="row g-4">
    <div class="col-xl-4 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h3 class="h5 mb-1 fw-semibold">8</h3>
                        <p class="text-secondary small mb-0">Tugas Terbaru</p>
                    </div>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill py-2 px-3">Baru</span>
                </div>
                <p class="small text-secondary">Pantau aktivitas teratas, status operasional, dan akses cepat ke halaman penting.</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h3 class="h5 mb-1 fw-semibold">24</h3>
                        <p class="text-secondary small mb-0">Transaksi</p>
                    </div>
                    <span class="badge bg-info bg-opacity-10 text-info rounded-pill py-2 px-3">Stabil</span>
                </div>
                <p class="small text-secondary">Informasi ringkas untuk pemantauan KPI harian.</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h3 class="h5 mb-1 fw-semibold">5</h3>
                        <p class="text-secondary small mb-0">Tim Aktif</p>
                    </div>
                    <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill py-2 px-3">Stabil</span>
                </div>
                <p class="small text-secondary">Tim operasional terhubung dan siap menangani permintaan.</p>
            </div>
        </div>
    </div>
</div>
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h3 class="h6 fw-bold mb-3">Pembaruan Sistem</h3>
                <ul class="list-group list-group-borderless">
                    <li class="list-group-item px-0 py-3 border-bottom">
                        <strong>Backup otomatis</strong>
                        <p class="small text-secondary mb-0">Dijalankan setiap 24 jam.</p>
                    </li>
                    <li class="list-group-item px-0 py-3 border-bottom">
                        <strong>Perbaikan performa</strong>
                        <p class="small text-secondary mb-0">Cache halaman internal diperbarui.</p>
                    </li>
                    <li class="list-group-item px-0 py-3">
                        <strong>Pengingat keamanan</strong>
                        <p class="small text-secondary mb-0">Pastikan akun Anda menggunakan password kuat.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100 bg-primary-subtle">
            <div class="card-body">
                <h3 class="h6 fw-bold mb-3">Aksi Cepat</h3>
                <div class="d-flex flex-column gap-3">
                    <a class="btn btn-white border shadow-sm text-start" href="dashboard.php?page=form">
                        <strong>Isi Form Internal</strong>
                        <div class="text-secondary small">Form data pelanggan dan permintaan layanan.</div>
                    </a>
                    <a class="btn btn-white border shadow-sm text-start" href="dashboard.php?page=tabel">
                        <strong>Lihat Tabel</strong>
                        <div class="text-secondary small">Ringkasan daftar data operasional.</div>
                    </a>
                    <a class="btn btn-white border shadow-sm text-start" href="dashboard.php?page=company_profile">
                        <strong>Company Profile</strong>
                        <div class="text-secondary small">Tema Car Wash CleanWash.</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
