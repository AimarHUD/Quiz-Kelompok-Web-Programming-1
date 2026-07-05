<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/navbar.php'; ?>

<section id="testimoni" class="section-shell">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Testimoni Pelanggan</h2>
            <p class="section-subtitle">Apa kata pelanggan kami setelah menikmati layanan kami.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testi-card">
                    <p class="text-muted mb-3">“Hasil cucinya sangat bersih dan cepat, saya sangat puas.”</p>
                    <h6 class="fw-bold mb-0">Rina</h6>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="testi-card">
                    <p class="text-muted mb-3">“Pelayanannya ramah dan tempatnya nyaman untuk menunggu.”</p>
                    <h6 class="fw-bold mb-0">Andi</h6>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testi-card">
                    <p class="text-muted mb-3">“Mobil saya jadi kinclong seperti baru setelah dicuci di sini.”</p>
                    <h6 class="fw-bold mb-0">Dewi</h6>
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