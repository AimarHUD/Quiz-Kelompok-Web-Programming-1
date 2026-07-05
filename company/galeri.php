<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';

$stmt = $pdo->prepare('SELECT * FROM berita WHERE status = :status ORDER BY tanggal DESC, id DESC LIMIT 6');
$stmt->execute(['status' => 'publish']);
$beritaList = $stmt->fetchAll(PDO::FETCH_ASSOC);

$featured = $beritaList[0] ?? null;
$others = array_slice($beritaList, 1);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/navbar.php'; ?>

<section id="berita" class="section-shell">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="hero-badge">Berita Terbaru</span>
            <h2 class="section-title">Berita & Update Terbaru</h2>
            <p class="section-subtitle">Pantau kabar terbaru seputar layanan, tips merawat kendaraan, dan promosi dari CarWash Company.</p>
        </div>

        <?php if ($featured): ?>
            <div class="news-hero card overflow-hidden mb-4" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-7">
                        <img src="<?php echo e($featured['gambar'] ? '../uploads/' . $featured['gambar'] : 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1200&q=80'); ?>" alt="<?php echo e($featured['judul']); ?>">
                    </div>
                    <div class="col-lg-5">
                        <div class="p-4 p-lg-5 d-flex flex-column h-100 justify-content-center">
                            <span class="news-badge mb-3">Featured</span>
                            <h3 class="fw-bold mb-3"><?php echo e($featured['judul']); ?></h3>
                            <p class="text-muted mb-4"><?php echo e(substr(strip_tags($featured['isi']), 0, 180)); ?>...</p>
                            <div class="d-flex flex-wrap gap-3 small text-muted">
                                <span><i class="bi bi-tags me-1"></i><?php echo e($featured['kategori']); ?></span>
                                <span><i class="bi bi-person me-1"></i><?php echo e($featured['penulis']); ?></span>
                                <span><i class="bi bi-calendar2-date me-1"></i><?php echo e($featured['tanggal']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($others): ?>
            <div class="row g-4">
                <?php foreach ($others as $item): ?>
                    <div class="col-md-6 col-xl-4" data-aos="zoom-in">
                        <article class="news-card h-100">
                            <img src="<?php echo e($item['gambar'] ? '../uploads/' . $item['gambar'] : 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?auto=format&fit=crop&w=900&q=80'); ?>" alt="<?php echo e($item['judul']); ?>">
                            <div class="p-4">
                                <div class="news-meta mb-3">
                                    <span><?php echo e($item['kategori']); ?></span>
                                    <span><?php echo e($item['tanggal']); ?></span>
                                </div>
                                <h4 class="fw-bold mb-3"><?php echo e($item['judul']); ?></h4>
                                <p class="text-muted mb-0"><?php echo e(substr(strip_tags($item['isi']), 0, 120)); ?>...</p>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-light rounded-4 border" data-aos="fade-up">
                Belum ada berita yang dipublikasikan saat ini.
            </div>
        <?php endif; ?>
    </div>
</section>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>
<?php include __DIR__ . '/../includes/footer.php'; ?>