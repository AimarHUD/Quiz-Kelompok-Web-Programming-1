<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/navbar.php'; ?>

<section id="faq" class="section-shell">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">FAQ</h2>
            <p class="section-subtitle">Jawaban untuk pertanyaan yang sering ditanyakan pelanggan kami.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="faq-card">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Apakah ada layanan antar jemput?</button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">Saat ini kami menyediakan layanan antar jemput sesuai area tertentu.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Berapa lama proses pencucian?</button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">Proses pencucian bisa selesai dalam 30-60 menit tergantung paket yang dipilih.</div>
                            </div>
                        </div>
                    </div>
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