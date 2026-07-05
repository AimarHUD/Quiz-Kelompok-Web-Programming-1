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
                <h3 class="fw-bold mb-3">Edit Berita</h3>
                <form action="proses.php" method="post" enctype="multipart/form-data" class="row g-3">
                    <input type="hidden" name="aksi" value="edit">
                    <input type="hidden" name="id" value="<?php echo e($item['id']); ?>">
                    <div class="col-md-6">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="<?php echo e($item['judul']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" value="<?php echo e($item['kategori']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="<?php echo e($item['penulis']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="<?php echo e($item['tanggal']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" <?php echo $item['status'] === 'draft' ? 'selected' : ''; ?>>Draft</option>
                            <option value="publish" <?php echo $item['status'] === 'publish' ? 'selected' : ''; ?>>Publish</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                        <?php if ($item['gambar']): ?>
                            <small class="text-muted">Gambar saat ini: <?php echo e($item['gambar']); ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="isi" rows="8" class="form-control" required><?php echo e($item['isi']); ?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Perbarui</button>
                        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
