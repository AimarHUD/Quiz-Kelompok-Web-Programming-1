<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireRole(['Admin']);

$flash = getFlash();

// Dashboard metrics
$userCount = $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
$bookingCount = $pdo->query('SELECT COUNT(*) FROM pelanggan')->fetchColumn();
$newsCount = $pdo->query('SELECT COUNT(*) FROM berita')->fetchColumn();
$serviceCount = $pdo->query('SELECT COUNT(*) FROM layanan')->fetchColumn();

// Latest activity: recent bookings and user registrations
$latestBookings = $pdo->query('SELECT nama, jenis_kendaraan, tanggal, jam, status, created_at FROM pelanggan ORDER BY created_at DESC LIMIT 5')->fetchAll();
$latestUsers = $pdo->query('SELECT nama, username, role, created_at FROM users ORDER BY created_at DESC LIMIT 5')->fetchAll();

// User management
$users = $pdo->query('SELECT id_user, nama, username, email, role, created_at FROM users ORDER BY created_at DESC')->fetchAll();

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $userId = isset($_POST['user_id']) ? (int) $_POST['user_id'] : 0;

    if ($action === 'add_user') {
        $nama = trim($_POST['nama'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $role = trim($_POST['role'] ?? 'User');
        $password = trim($_POST['password'] ?? '');

        if ($nama === '' || $username === '' || $email === '' || $password === '') {
            setFlash('danger', 'Semua field wajib diisi untuk menambahkan user.');
            redirect('/admin/index.php');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setFlash('danger', 'Format email tidak valid.');
            redirect('/admin/index.php');
        }

        $check = $pdo->prepare('SELECT COUNT(*) FROM users WHERE username = :username OR email = :email');
        $check->execute(['username' => $username, 'email' => $email]);
        if ($check->fetchColumn() > 0) {
            setFlash('danger', 'Username atau email sudah terdaftar.');
            redirect('/admin/index.php');
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert = $pdo->prepare('INSERT INTO users (nama, username, email, password, role) VALUES (:nama, :username, :email, :password, :role)');
        $insert->execute(['nama' => $nama, 'username' => $username, 'email' => $email, 'password' => $hash, 'role' => $role]);

        setFlash('success', 'User berhasil ditambahkan.');
        redirect('/admin/index.php');
    }

    if ($action === 'edit_user' && $userId > 0) {
        $nama = trim($_POST['nama'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $role = trim($_POST['role'] ?? 'User');

        if ($nama === '' || $username === '' || $email === '') {
            setFlash('danger', 'Nama, username, dan email wajib diisi.');
            redirect('/admin/index.php');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setFlash('danger', 'Format email tidak valid.');
            redirect('/admin/index.php');
        }

        $check = $pdo->prepare('SELECT COUNT(*) FROM users WHERE (username = :username OR email = :email) AND id_user != :id');
        $check->execute(['username' => $username, 'email' => $email, 'id' => $userId]);
        if ($check->fetchColumn() > 0) {
            setFlash('danger', 'Username atau email sudah digunakan oleh user lain.');
            redirect('/admin/index.php');
        }

        $update = $pdo->prepare('UPDATE users SET nama = :nama, username = :username, email = :email, role = :role WHERE id_user = :id');
        $update->execute(['nama' => $nama, 'username' => $username, 'email' => $email, 'role' => $role, 'id' => $userId]);

        setFlash('success', 'User berhasil diperbarui.');
        redirect('/admin/index.php');
    }

    if ($action === 'delete_user' && $userId > 0) {
        if ($userId === $_SESSION['user_id']) {
            setFlash('danger', 'Anda tidak dapat menghapus akun sendiri.');
            redirect('/admin/index.php');
        }

        $delete = $pdo->prepare('DELETE FROM users WHERE id_user = :id');
        $delete->execute(['id' => $userId]);

        setFlash('success', 'User berhasil dihapus.');
        redirect('/admin/index.php');
    }

    if ($action === 'reset_password' && $userId > 0) {
        $newPassword = trim($_POST['new_password'] ?? '');
        if ($newPassword === '') {
            setFlash('danger', 'Password baru wajib diisi.');
            redirect('/admin/index.php');
        }

        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $update = $pdo->prepare('UPDATE users SET password = :password WHERE id_user = :id');
        $update->execute(['password' => $hash, 'id' => $userId]);

        setFlash('success', 'Password berhasil direset.');
        redirect('/admin/index.php');
    }
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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Admin Panel</h3>
                        <p class="text-muted mb-0">Kelola pengguna, lihat statistik, dan pantau aktivitas terbaru.</p>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-plus-circle me-2"></i>Tambah User</button>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3" data-flash-message="<?php echo e($flash['message']); ?>">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card p-4 shadow-sm h-100">
                            <h6 class="text-muted">Total User</h6>
                            <h2 class="fw-bold"><?php echo e($userCount); ?></h2>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card p-4 shadow-sm h-100">
                            <h6 class="text-muted">Total Booking</h6>
                            <h2 class="fw-bold"><?php echo e($bookingCount); ?></h2>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card p-4 shadow-sm h-100">
                            <h6 class="text-muted">Total Berita</h6>
                            <h2 class="fw-bold"><?php echo e($newsCount); ?></h2>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card p-4 shadow-sm h-100">
                            <h6 class="text-muted">Total Layanan</h6>
                            <h2 class="fw-bold"><?php echo e($serviceCount); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-lg-6">
                        <div class="card p-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3">Aktivitas Terbaru</h5>
                            <div class="list-group list-group-flush">
                                <?php if ($latestBookings): ?>
                                    <?php foreach ($latestBookings as $booking): ?>
                                        <div class="list-group-item px-0 py-3 border-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1"><?php echo e($booking['nama']); ?></h6>
                                                    <p class="mb-1 text-secondary"><?php echo e($booking['jenis_kendaraan']); ?> - <?php echo e($booking['status']); ?></p>
                                                    <small class="text-muted"><?php echo e($booking['tanggal']); ?> <?php echo e($booking['jam']); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="text-center text-muted py-3">Tidak ada aktivitas booking terbaru.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card p-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3">Statistik Pengguna</h5>
                            <canvas id="userChart" height="220"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card p-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="fw-bold mb-1">Manajemen User</h5>
                            <p class="text-muted mb-0">Kelola akun admin dan user yang boleh masuk ke aplikasi.</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Terdaftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $index => $userRow): ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e($userRow['nama']); ?></td>
                                        <td><?php echo e($userRow['username']); ?></td>
                                        <td><?php echo e($userRow['email']); ?></td>
                                        <td><?php echo e($userRow['role']); ?></td>
                                        <td><?php echo e(date('d M Y', strtotime($userRow['created_at']))); ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo e($userRow['id_user']); ?>"><i class="bi bi-pencil"></i></button>
                                                <?php if ($userRow['id_user'] !== $_SESSION['user_id']): ?>
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo e($userRow['id_user']); ?>"><i class="bi bi-trash"></i></button>
                                                <?php endif; ?>
                                                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#resetPasswordModal<?php echo e($userRow['id_user']); ?>"><i class="bi bi-key-fill"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo BASE_URL; ?>/admin/index.php">
                <input type="hidden" name="action" value="add_user">
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="Admin">Admin</option>
                            <option value="User" selected>User</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($users as $userRow): ?>
<div class="modal fade" id="editUserModal<?php echo e($userRow['id_user']); ?>" tabindex="-1" aria-labelledby="editUserModalLabel<?php echo e($userRow['id_user']); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel<?php echo e($userRow['id_user']); ?>">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo BASE_URL; ?>/admin/index.php">
                <input type="hidden" name="action" value="edit_user">
                <input type="hidden" name="user_id" value="<?php echo e($userRow['id_user']); ?>">
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo e($userRow['nama']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo e($userRow['username']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo e($userRow['email']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="Admin" <?php echo $userRow['role'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                            <option value="User" <?php echo $userRow['role'] === 'User' ? 'selected' : ''; ?>>User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="resetPasswordModal<?php echo e($userRow['id_user']); ?>" tabindex="-1" aria-labelledby="resetPasswordModalLabel<?php echo e($userRow['id_user']); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetPasswordModalLabel<?php echo e($userRow['id_user']); ?>">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo BASE_URL; ?>/admin/index.php">
                <input type="hidden" name="action" value="reset_password">
                <input type="hidden" name="user_id" value="<?php echo e($userRow['id_user']); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteUserModal<?php echo e($userRow['id_user']); ?>" tabindex="-1" aria-labelledby="deleteUserModalLabel<?php echo e($userRow['id_user']); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel<?php echo e($userRow['id_user']); ?>">Hapus User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo BASE_URL; ?>/admin/index.php">
                <input type="hidden" name="action" value="delete_user">
                <input type="hidden" name="user_id" value="<?php echo e($userRow['id_user']); ?>">
                <div class="modal-body">
                    <p>Yakin ingin menghapus user <strong><?php echo e($userRow['nama']); ?></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
    const adminLabels = ['User', 'Booking', 'Berita', 'Layanan'];
    const adminData = [<?php echo e($userCount); ?>, <?php echo e($bookingCount); ?>, <?php echo e($newsCount); ?>, <?php echo e($serviceCount); ?>];
    const userChartCtx = document.getElementById('userChart');
    if (userChartCtx && typeof Chart !== 'undefined') {
        new Chart(userChartCtx, {
            type: 'doughnut',
            data: {
                labels: adminLabels,
                datasets: [{
                    data: adminData,
                    backgroundColor: ['#2563eb', '#38bdf8', '#0ea5e9', '#7dd3fc'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>