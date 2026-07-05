<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();
$user = currentUser();
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<div class="container-fluid py-4 px-4">
    <div class="row g-4">
        <div class="col-lg-3">
            <?php include __DIR__ . '/../includes/sidebar.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="card p-4 border-0">
                <?php echo renderBreadcrumb(); ?>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Dashboard Admin</h3>
                        <p class="text-muted mb-0">Selamat datang, <?php echo e($user['nama']); ?>! Kelola semuanya dari satu tempat.</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                        <span class="badge bg-primary rounded-pill"><?php echo e($user['role']); ?></span>
                        <span class="badge bg-light text-dark" id="todayDate"></span>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="card stat-card border-0 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Jumlah User</h6>
                                    <h3 class="fw-bold mb-0">24</h3>
                                </div>
                                <i class="bi bi-people-fill fs-2 text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card stat-card border-0 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Jumlah Berita</h6>
                                    <h3 class="fw-bold mb-0">12</h3>
                                </div>
                                <i class="bi bi-newspaper fs-2 text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card stat-card border-0 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Pengunjung</h6>
                                    <h3 class="fw-bold mb-0">1.2K</h3>
                                </div>
                                <i class="bi bi-graph-up-arrow fs-2 text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card stat-card border-0 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Layanan</h6>
                                    <h3 class="fw-bold mb-0">8</h3>
                                </div>
                                <i class="bi bi-car-front-fill fs-2 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-lg-8">
                        <div class="card border-0 p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Grafik Pengunjung</h5>
                                <span class="text-muted">7 Hari Terakhir</span>
                            </div>
                            <canvas id="visitorChart" height="220"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-0 p-3 h-100">
                            <h5 class="fw-bold mb-3">Jam Digital</h5>
                            <div class="display-5 fw-bold text-primary" id="digitalClock">--:--:--</div>
                            <p class="text-muted mt-2 mb-0">Waktu server sekarang</p>
                            <div class="mt-4">
                                <h6 class="fw-bold">Tanggal Hari Ini</h6>
                                <p class="text-muted mb-0" id="currentDate"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="card border-0 p-3">
                            <h5 class="fw-bold mb-3">Welcome Message</h5>
                            <p class="text-muted mb-0">Halo <?php echo e($user['nama']); ?>, dashboard admin siap membantu Anda memantau aktivitas perusahaan, mengelola berita, dan mengakses fitur utama dengan cepat.</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card border-0 p-3">
                            <h5 class="fw-bold mb-3">Quick Access Menu</h5>
                            <div class="quick-access d-grid gap-2">
                                <a href="<?php echo BASE_URL; ?>/berita/index.php" class="btn btn-outline-primary"><i class="bi bi-newspaper me-2"></i>Kelola Berita</a>
                                <a href="<?php echo BASE_URL; ?>/dashboard/form.php" class="btn btn-outline-primary"><i class="bi bi-ui-checks me-2"></i>Form</a>
                                <a href="<?php echo BASE_URL; ?>/dashboard/tabel.php" class="btn btn-outline-primary"><i class="bi bi-table me-2"></i>Tabel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('visitorChart');
    if (ctx && typeof Chart !== 'undefined') {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pengunjung',
                    data: [120, 180, 150, 220, 260, 190, 300],
                    backgroundColor: ['#2563eb', '#3b82f6', '#60a5fa', '#93c5fd', '#bfdbfe', '#dbeafe', '#eff6ff'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    } else if (ctx) {
        ctx.innerHTML = '<div class="text-muted small py-4 text-center">Grafik tidak dapat dimuat saat ini.</div>';
    }

    function updateClock() {
        const clockEl = document.getElementById('digitalClock');
        const dateEl = document.getElementById('currentDate');
        const todayDateEl = document.getElementById('todayDate');
        const now = new Date();

        if (clockEl) {
            clockEl.textContent = now.toLocaleTimeString('id-ID');
        }
        if (dateEl) {
            dateEl.textContent = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        }
        if (todayDateEl) {
            todayDateEl.textContent = now.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'short' });
        }
    }

    updateClock();
    setInterval(updateClock, 1000);
</script>

<?php include __DIR__ . '/../includes/footer-dashboard.php'; ?>


