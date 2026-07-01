<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($action === 'update_booking') {
        $nama = trim($_POST['nama'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $no_hp = trim($_POST['no_hp'] ?? '');
        $jenis_kendaraan = trim($_POST['jenis_kendaraan'] ?? '');
        $merk_kendaraan = trim($_POST['merk_kendaraan'] ?? '');
        $nomor_polisi = trim($_POST['nomor_polisi'] ?? '');
        $jenis_paket = trim($_POST['jenis_paket'] ?? '');
        $tanggal = trim($_POST['tanggal'] ?? '');
        $jam = trim($_POST['jam'] ?? '');
        $status = trim($_POST['status'] ?? 'Pending');
        $catatan = trim($_POST['catatan'] ?? '');

        if ($id <= 0 || $nama === '' || $email === '' || $no_hp === '' || $jenis_kendaraan === '' || $merk_kendaraan === '' || $nomor_polisi === '' || $jenis_paket === '' || $tanggal === '' || $jam === '') {
            setFlash('danger', 'Semua field wajib diisi saat memperbarui booking.');
            redirect('/tabel/index.php');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setFlash('danger', 'Format email tidak valid.');
            redirect('/tabel/index.php');
        }

        $update = $pdo->prepare('UPDATE pelanggan SET nama = :nama, email = :email, no_hp = :no_hp, jenis_kendaraan = :jenis_kendaraan, merk_kendaraan = :merk_kendaraan, nomor_polisi = :nomor_polisi, jenis_paket = :jenis_paket, tanggal = :tanggal, jam = :jam, status = :status, catatan = :catatan WHERE id = :id');
        $update->execute([
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp,
            'jenis_kendaraan' => $jenis_kendaraan,
            'merk_kendaraan' => $merk_kendaraan,
            'nomor_polisi' => $nomor_polisi,
            'jenis_paket' => $jenis_paket,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'status' => $status,
            'catatan' => $catatan,
            'id' => $id,
        ]);

        setFlash('success', 'Data booking berhasil diperbarui.');
        redirect('/tabel/index.php');
    }

    if ($action === 'delete_booking') {
        if ($id <= 0) {
            setFlash('danger', 'ID booking tidak valid.');
            redirect('/tabel/index.php');
        }

        $delete = $pdo->prepare('DELETE FROM pelanggan WHERE id = :id');
        $delete->execute(['id' => $id]);

        setFlash('success', 'Data booking berhasil dihapus.');
        redirect('/tabel/index.php');
    }
}

$stmt = $pdo->query('SELECT * FROM pelanggan ORDER BY created_at DESC');
$pelanggan = $stmt->fetchAll();
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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                    <div>
                        <h3 class="fw-bold mb-1">Data Booking</h3>
                        <p class="text-muted mb-0">Tampilkan seluruh data booking dengan kontrol detail, edit, dan hapus.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>/form/index.php" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Booking</a>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3" data-flash-message="<?php echo e($flash['message']); ?>">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table id="pelangganTable" class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>No HP</th>
                                <th>Jenis Kendaraan</th>
                                <th>Nomor Polisi</th>
                                <th>Paket</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pelanggan): ?>
                                <?php foreach ($pelanggan as $index => $row): ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e($row['nama']); ?></td>
                                        <td><?php echo e($row['no_hp']); ?></td>
                                        <td><?php echo e($row['jenis_kendaraan']); ?> - <?php echo e($row['merk_kendaraan']); ?></td>
                                        <td><?php echo e($row['nomor_polisi']); ?></td>
                                        <td><?php echo e($row['jenis_paket']); ?></td>
                                        <td><?php echo e($row['tanggal']); ?></td>
                                        <td><?php echo e($row['jam']); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo e($row['status'] === 'Completed' ? 'success' : ($row['status'] === 'Canceled' ? 'danger' : ($row['status'] === 'Confirmed' ? 'info' : 'secondary'))); ?>">
                                                <?php echo e($row['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo e($row['id']); ?>"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($row['id']); ?>"><i class="bi bi-pencil"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($row['id']); ?>"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="10" class="text-center text-muted py-4">Belum ada data booking.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($pelanggan as $row): ?>
<div class="modal fade" id="detailModal<?php echo e($row['id']); ?>" tabindex="-1" aria-labelledby="detailModalLabel<?php echo e($row['id']); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel<?php echo e($row['id']); ?>">Detail Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Pelanggan:</strong> <?php echo e($row['nama']); ?></p>
                <p><strong>Email:</strong> <?php echo e($row['email']); ?></p>
                <p><strong>No HP:</strong> <?php echo e($row['no_hp']); ?></p>
                <p><strong>Jenis Kendaraan:</strong> <?php echo e($row['jenis_kendaraan']); ?></p>
                <p><strong>Merk Kendaraan:</strong> <?php echo e($row['merk_kendaraan']); ?></p>
                <p><strong>Nomor Polisi:</strong> <?php echo e($row['nomor_polisi']); ?></p>
                <p><strong>Paket:</strong> <?php echo e($row['jenis_paket']); ?></p>
                <p><strong>Tanggal:</strong> <?php echo e($row['tanggal']); ?></p>
                <p><strong>Jam:</strong> <?php echo e($row['jam']); ?></p>
                <p><strong>Status:</strong> <?php echo e($row['status']); ?></p>
                <p><strong>Catatan:</strong> <?php echo e($row['catatan']); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal<?php echo e($row['id']); ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo e($row['id']); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?php echo e($row['id']); ?>">Edit Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo BASE_URL; ?>/tabel/index.php">
                <input type="hidden" name="action" value="update_booking">
                <input type="hidden" name="id" value="<?php echo e($row['id']); ?>">
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo e($row['nama']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo e($row['email']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="<?php echo e($row['no_hp']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="form-select" required>
                            <option value="Mobil" <?php echo $row['jenis_kendaraan'] === 'Mobil' ? 'selected' : ''; ?>>Mobil</option>
                            <option value="Motor" <?php echo $row['jenis_kendaraan'] === 'Motor' ? 'selected' : ''; ?>>Motor</option>
                            <option value="Truk" <?php echo $row['jenis_kendaraan'] === 'Truk' ? 'selected' : ''; ?>>Truk</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Merk Kendaraan</label>
                        <input type="text" name="merk_kendaraan" class="form-control" value="<?php echo e($row['merk_kendaraan']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Polisi</label>
                        <input type="text" name="nomor_polisi" class="form-control" value="<?php echo e($row['nomor_polisi']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Paket</label>
                        <select name="jenis_paket" class="form-select" required>
                            <option value="Reguler" <?php echo $row['jenis_paket'] === 'Reguler' ? 'selected' : ''; ?>>Reguler</option>
                            <option value="Premium" <?php echo $row['jenis_paket'] === 'Premium' ? 'selected' : ''; ?>>Premium</option>
                            <option value="Express" <?php echo $row['jenis_paket'] === 'Express' ? 'selected' : ''; ?>>Express</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="<?php echo e($row['tanggal']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jam</label>
                        <input type="time" name="jam" class="form-control" value="<?php echo e($row['jam']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="Pending" <?php echo $row['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="Confirmed" <?php echo $row['status'] === 'Confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="Completed" <?php echo $row['status'] === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                            <option value="Canceled" <?php echo $row['status'] === 'Canceled' ? 'selected' : ''; ?>>Canceled</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Catatan</label>
                        <textarea name="catatan" rows="4" class="form-control"><?php echo e($row['catatan']); ?></textarea>
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

<div class="modal fade" id="deleteModal<?php echo e($row['id']); ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo e($row['id']); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?php echo e($row['id']); ?>">Hapus Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo BASE_URL; ?>/tabel/index.php">
                <input type="hidden" name="action" value="delete_booking">
                <input type="hidden" name="id" value="<?php echo e($row['id']); ?>">
                <div class="modal-body">
                    <p>Yakin ingin menghapus booking <strong><?php echo e($row['nama']); ?></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
    $(document).ready(function () {
        $('#pelangganTable').DataTable({
            responsive: true,
            order: [[0, 'desc']],
            language: {
                search: 'Cari:',
                lengthMenu: 'Tampilkan _MENU_ entri',
                info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
                paginate: {
                    previous: 'Sebelumnya',
                    next: 'Berikutnya'
                }
            }
        });
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
