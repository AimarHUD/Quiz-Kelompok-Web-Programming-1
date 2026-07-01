<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';
requireLogin();

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare('SELECT * FROM berita WHERE id = :id');
$stmt->execute(['id' => $id]);
$item = $stmt->fetch();

if (!$item) {
    setFlash('danger', 'Berita tidak ditemukan.');
    redirect('/berita/index.php');
}
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
                <div class="mb-3">
                    <a href="index.php" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                </div>
                <h3 class="fw-bold mb-2"><?php echo e($item['judul']); ?></h3>
                <p class="text-muted mb-3">
                    <span class="badge bg-primary"><?php echo e($item['kategori']); ?></span>
                    <span class="ms-2">Penulis: <?php echo e($item['penulis']); ?></span>
                    <span class="ms-2">Tanggal: <?php echo e($item['tanggal']); ?></span>
                    <span class="ms-2">Status: <?php echo e($item['status']); ?></span>
                </p>
                <?php if ($item['gambar']): ?>
                    <img src="<?php echo BASE_URL; ?>/assets/uploads/<?php echo e($item['gambar']); ?>" class="img-fluid rounded mb-3" alt="gambar berita">
                <?php endif; ?>
                <p><?php echo nl2br(e($item['isi'])); ?></p>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
