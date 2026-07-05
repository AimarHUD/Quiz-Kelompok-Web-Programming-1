<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$user = currentUser();
$flash = getFlash();
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
                <h3 class="fw-bold mb-3">Upload Foto Profil</h3>
                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>
                <form action="upload_foto.php" method="post" enctype="multipart/form-data" class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Pilih Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-upload me-2"></i>Upload</button>
                        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['foto']) || $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        setFlash('danger', 'Upload gagal.');
        redirect('/profile/upload_foto.php');
    }

    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed, true)) {
        setFlash('danger', 'Format file tidak didukung.');
        redirect('/profile/upload_foto.php');
    }

    $targetDir = __DIR__ . '/../assets/uploads/profiles';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = 'user_' . $user['id_user'] . '_' . time() . '.' . $ext;
    $targetFile = $targetDir . '/' . $fileName;

    if (!move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
        setFlash('danger', 'Gagal menyimpan foto.');
        redirect('/profile/upload_foto.php');
    }

    $stmt = $pdo->prepare('SELECT foto FROM users WHERE id_user = :id');
    $stmt->execute(['id' => $user['id_user']]);
    $current = $stmt->fetch();
    if ($current['foto'] && file_exists($targetDir . '/' . $current['foto'])) {
        unlink($targetDir . '/' . $current['foto']);
    }

    $update = $pdo->prepare('UPDATE users SET foto = :foto WHERE id_user = :id');
    $update->execute(['foto' => $fileName, 'id' => $user['id_user']]);

    setFlash('success', 'Foto profil berhasil diupload.');
    redirect('/profile/index.php');
}
