<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-car-front-fill me-2"></i>CarWash Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#companyNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="companyNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#visi">Visi</a></li>
                <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php include __DIR__ . '/sections/hero.php'; ?>
<?php include __DIR__ . '/sections/tentang.php'; ?>
<?php include __DIR__ . '/sections/visi.php'; ?>
<?php include __DIR__ . '/sections/misi.php'; ?>
<?php include __DIR__ . '/sections/layanan.php'; ?>
<?php include __DIR__ . '/sections/galeri.php'; ?>
<?php include __DIR__ . '/sections/testimoni.php'; ?>
<?php include __DIR__ . '/sections/faq.php'; ?>
<?php include __DIR__ . '/sections/kontak.php'; ?>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p class="mb-0">© 2026 CarWash Company. All rights reserved.</p>
    </div>
</footer>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>
<?php include __DIR__ . '/../includes/footer.php'; ?>
