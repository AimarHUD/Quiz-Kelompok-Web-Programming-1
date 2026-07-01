<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$user = currentUser();
$flash = getFlash();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nama === '' || $username === '' || $email === '') {
        setFlash('danger', 'Semua field wajib diisi.');
        redirect('/profile/edit.php');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setFlash('danger', 'Format email tidak valid.');
        redirect('/profile/edit.php');
    }

    $checkStmt = $pdo->prepare('SELECT id_user FROM users WHERE (username = :username OR email = :email) AND id_user != :id LIMIT 1');
    $checkStmt->execute([
        'username' => $username,
        'email' => $email,
        'id' => $user['id_user'],
    ]);
    $existing = $checkStmt->fetch();

    if ($existing) {
        setFlash('danger', 'Username atau email sudah digunakan.');
        redirect('/profile/edit.php');
    }

    $stmt = $pdo->prepare('UPDATE users SET nama = :nama, username = :username, email = :email WHERE id_user = :id');
    $stmt->execute([
        'nama' => $nama,
        'username' => $username,
        'email' => $email,
        'id' => $user['id_user'],
    ]);

    $_SESSION['nama'] = $nama;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    setFlash('success', 'Profil berhasil diperbarui.');
    redirect('/profile/index.php');
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id_user = :id');
$stmt->execute(['id' => $user['id_user']]);
$row = $stmt->fetch();
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
                <h3 class="fw-bold mb-3">Edit Profile</h3>
                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>
                <form action="edit.php" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo e($row['nama']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo e($row['username']); ?>" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo e($row['email']); ?>" required>
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

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nama === '' || $username === '' || $email === '') {
        setFlash('danger', 'Semua field wajib diisi.');
        redirect('/profile/edit.php');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setFlash('danger', 'Format email tidak valid.');
        redirect('/profile/edit.php');
    }

    $stmt = $pdo->prepare('UPDATE users SET nama = :nama, username = :username, email = :email WHERE id_user = :id');
    $stmt->execute([
        'nama' => $nama,
        'username' => $username,
        'email' => $email,
        'id' => $user['id_user'],
    ]);

    $_SESSION['nama'] = $nama;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    setFlash('success', 'Profil berhasil diperbarui.');
    redirect('/profile/index.php');
}
