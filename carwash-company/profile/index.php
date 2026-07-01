<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';
requireLogin();

$user = currentUser();
$stmt = $pdo->prepare('SELECT * FROM users WHERE id_user = :id');
$stmt->execute(['id' => $user['id_user']]);
$row = $stmt->fetch();
$flash = getFlash();
$profilePhoto = getUserProfilePhoto($user['id_user'], $row['foto'] ?? null);
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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Profil Saya</h3>
                        <p class="text-muted mb-0">Lihat dan kelola informasi akun Anda.</p>
                    </div>
                    <div class="btn-group mt-3 mt-md-0">
                        <a href="edit.php" class="btn btn-outline-primary"><i class="bi bi-pencil me-2"></i>Edit Profile</a>
                        <a href="upload_foto.php" class="btn btn-outline-secondary"><i class="bi bi-camera me-2"></i>Upload Foto</a>
                        <a href="ubah_password.php" class="btn btn-outline-dark"><i class="bi bi-key me-2"></i>Ubah Password</a>
                    </div>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3" data-flash-message="<?php echo e($flash['message']); ?>">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>

                <div class="row g-4 align-items-center">
                    <div class="col-md-4 text-center">
                        <?php if ($profilePhoto): ?>
                            <img src="<?php echo e($profilePhoto); ?>" alt="Foto Profil" class="rounded-circle shadow" style="width: 180px; height: 180px; object-fit: cover;">
                        <?php else: ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['nama'] ?? 'User'); ?>&background=2563eb&color=fff" alt="Foto Profil" class="rounded-circle shadow" style="width: 180px; height: 180px; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Nama</label>
                                <div class="fw-bold fs-5"><?php echo e($row['nama']); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Username</label>
                                <div class="fw-bold fs-5"><?php echo e($row['username']); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Email</label>
                                <div class="fw-bold fs-5"><?php echo e($row['email']); ?></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Role</label>
                                <div class="fw-bold fs-5"><?php echo e($row['role']); ?></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted">Tanggal Bergabung</label>
                                <div class="fw-bold fs-5"><?php echo e(date('d M Y', strtotime($row['created_at']))); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
