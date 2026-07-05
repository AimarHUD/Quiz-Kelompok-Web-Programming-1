<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/navbar.php'; ?>

<section class="section-shell py-5">
    <div class="container">
        <div class="row g-4 align-items-start" data-aos="fade-up">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="contact-card p-4 p-lg-5">
                    <h2 class="section-title">Contact Us</h2>
                    <p class="text-muted">Hubungi kami untuk reservasi atau pertanyaan lebih lanjut mengenai layanan terbaik kami.</p>
                    <ul class="list-unstyled contact-list mt-4">
                        <li><i class="bi bi-geo-alt-fill text-primary me-2"></i>Jl. Sudirman No. 123, Jakarta</li>
                        <li><i class="bi bi-telephone-fill text-primary me-2"></i>+62 812-3456-7890</li>
                        <li><i class="bi bi-envelope-fill text-primary me-2"></i>info@carwashcompany.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="card border-0 p-3">
                    <iframe src="https://www.google.com/maps?q=Jakarta&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
