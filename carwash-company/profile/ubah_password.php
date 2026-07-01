<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$user = currentUser();
$flash = getFlash();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passwordLama = $_POST['password_lama'] ?? '';
    $passwordBaru = $_POST['password_baru'] ?? '';
    $konfirmasi = $_POST['konfirmasi_password'] ?? '';

    if ($passwordLama === '' || $passwordBaru === '' || $konfirmasi === '') {
        setFlash('danger', 'Semua field password wajib diisi.');
        redirect('/profile/ubah_password.php');
    }

    $stmt = $pdo->prepare('SELECT password FROM users WHERE id_user = :id');
    $stmt->execute(['id' => $user['id_user']]);
    $row = $stmt->fetch();

    if (!$row || !password_verify($passwordLama, $row['password'])) {
        setFlash('danger', 'Password lama tidak sesuai.');
        redirect('/profile/ubah_password.php');
    }

    if (strlen($passwordBaru) < 6) {
        setFlash('danger', 'Password baru minimal 6 karakter.');
        redirect('/profile/ubah_password.php');
    }

    if ($passwordBaru !== $konfirmasi) {
        setFlash('danger', 'Konfirmasi password tidak cocok.');
        redirect('/profile/ubah_password.php');
    }

    $newHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
    $update = $pdo->prepare('UPDATE users SET password = :password WHERE id_user = :id');
    $update->execute(['password' => $newHash, 'id' => $user['id_user']]);

    setFlash('success', 'Password berhasil diubah.');
    redirect('/profile/index.php');
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
                <h3 class="fw-bold mb-3">Ubah Password</h3>
                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>
                <form action="ubah_password.php" method="post" class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password_baru" id="password_baru" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-key me-2"></i>Ubah Password</button>
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
    $passwordLama = $_POST['password_lama'] ?? '';
    $passwordBaru = $_POST['password_baru'] ?? '';
    $konfirmasi = $_POST['konfirmasi_password'] ?? '';

    if ($passwordLama === '' || $passwordBaru === '' || $konfirmasi === '') {
        setFlash('danger', 'Semua field password wajib diisi.');
        redirect('/profile/ubah_password.php');
    }

    $stmt = $pdo->prepare('SELECT password FROM users WHERE id_user = :id');
    $stmt->execute(['id' => $user['id_user']]);
    $row = $stmt->fetch();

    if (!$row || !password_verify($passwordLama, $row['password'])) {
        setFlash('danger', 'Password lama tidak sesuai.');
        redirect('/profile/ubah_password.php');
    }

    if (strlen($passwordBaru) < 6) {
        setFlash('danger', 'Password baru minimal 6 karakter.');
        redirect('/profile/ubah_password.php');
    }

    if ($passwordBaru !== $konfirmasi) {
        setFlash('danger', 'Konfirmasi password tidak cocok.');
        redirect('/profile/ubah_password.php');
    }

    $newHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
    $update = $pdo->prepare('UPDATE users SET password = :password WHERE id_user = :id');
    $update->execute(['password' => $newHash, 'id' => $user['id_user']]);

    setFlash('success', 'Password berhasil diubah.');
    redirect('/profile/index.php');
}
