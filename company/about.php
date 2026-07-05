<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/navbar.php'; ?>

<section class="section-shell py-5">
    <div class="container">
        <div class="row g-4 align-items-center" data-aos="fade-up">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?auto=format&fit=crop&w=900&q=80" alt="Tentang kami" class="img-fluid rounded-4 shadow-sm">
            </div>
            <div class="col-lg-6">
                <div class="info-card p-4 p-lg-5">
                    <h2 class="section-title">About Us</h2>
                    <p class="text-muted mb-3">CarWash Company adalah layanan pencucian mobil modern yang berkomitmen memberikan kualitas terbaik, kenyamanan, dan hasil bersih maksimal untuk setiap pelanggan.</p>
                    <p class="text-muted mb-0">Kami menggabungkan teknologi canggih, bahan ramah lingkungan, dan tim profesional agar kendaraan Anda selalu tampil prima, harum, dan siap menemani setiap aktivitas Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>
<?php include __DIR__ . '/../includes/footer.php'; ?>
