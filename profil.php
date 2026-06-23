<?php
declare(strict_types=1);

if (!defined('DASHBOARD_ACCESS')) {
    header('Location: dashboard.php');
    exit;
}
?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
    <div>
        <h2 class="h4 mb-1 fw-bold text-dark"><i class="bi bi-person-circle me-2 text-primary"></i>Profil</h2>
        <p class="text-secondary mb-0">Informasi akun pengguna dan preferensi dasar.</p>
    </div>
    <span class="badge bg-secondary text-uppercase py-2 px-3">Akun</span>
</div>
<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <div class="mb-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                        <i class="bi bi-person-fill fs-1 text-primary"></i>
                    </div>
                </div>
                <h3 class="h5 fw-bold mb-1"><?= htmlspecialchars($userName) ?></h3>
                <p class="text-secondary small mb-0"><?= htmlspecialchars($userEmail) ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h6 fw-bold mb-3">Detail Akun</h3>
                <dl class="row mb-0">
                    <dt class="col-sm-4 text-secondary">Nama</dt>
                    <dd class="col-sm-8"><?= htmlspecialchars($userName) ?></dd>

                    <dt class="col-sm-4 text-secondary">Email</dt>
                    <dd class="col-sm-8"><?= htmlspecialchars($userEmail) ?></dd>

                    <dt class="col-sm-4 text-secondary">Peran</dt>
                    <dd class="col-sm-8">Administrator</dd>

                    <dt class="col-sm-4 text-secondary">Status</dt>
                    <dd class="col-sm-8"><span class="badge bg-success">Aktif</span></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <h3 class="h6 fw-bold mb-3">Alamat Admin</h3>
        <p class="text-secondary mb-0">Jalan Kebangkitan No. 12, Bandung, Jawa Barat</p>
    </div>
</div>
