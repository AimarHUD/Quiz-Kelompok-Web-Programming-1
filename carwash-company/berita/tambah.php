<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();
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
                <h3 class="fw-bold mb-3">Tambah Berita</h3>
                <form action="proses.php" method="post" enctype="multipart/form-data" class="row g-3">
                    <input type="hidden" name="aksi" value="tambah">
                    <div class="col-md-6">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft">Draft</option>
                            <option value="publish">Publish</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="isi" rows="8" class="form-control" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
                        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
