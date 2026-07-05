<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

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
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="fw-bold mb-1">Data Pelanggan</h3>
                        <p class="text-muted mb-0">Tampilkan seluruh data pelanggan dalam tabel interaktif.</p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>/form/index.php" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Pelanggan</a>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3" data-flash-message="<?php echo e($flash['message']); ?>">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table id="pelangganTable" class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Jenis Kendaraan</th>
                                <th>Nomor Polisi</th>
                                <th>Jenis Paket</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pelanggan): ?>
                                <?php foreach ($pelanggan as $row): ?>
                                    <tr>
                                        <td><?php echo e($row['id']); ?></td>
                                        <td><?php echo e($row['nama']); ?></td>
                                        <td><?php echo e($row['email']); ?></td>
                                        <td><?php echo e($row['no_hp']); ?></td>
                                        <td><?php echo e($row['jenis_kendaraan']); ?></td>
                                        <td><?php echo e($row['nomor_polisi']); ?></td>
                                        <td><?php echo e($row['jenis_paket']); ?></td>
                                        <td><?php echo e($row['tanggal']); ?></td>
                                        <td><?php echo e($row['jam']); ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo e($row['id']); ?>"><i class="bi bi-eye"></i></button>
                                                <a href="#" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                                <a href="#" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="10" class="text-center text-muted py-4">Belum ada data pelanggan.</td></tr>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel<?php echo e($row['id']); ?>">Detail Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> <?php echo e($row['nama']); ?></p>
                <p><strong>Email:</strong> <?php echo e($row['email']); ?></p>
                <p><strong>No HP:</strong> <?php echo e($row['no_hp']); ?></p>
                <p><strong>Jenis Kendaraan:</strong> <?php echo e($row['jenis_kendaraan']); ?></p>
                <p><strong>Nomor Polisi:</strong> <?php echo e($row['nomor_polisi']); ?></p>
                <p><strong>Jenis Paket:</strong> <?php echo e($row['jenis_paket']); ?></p>
                <p><strong>Tanggal:</strong> <?php echo e($row['tanggal']); ?></p>
                <p><strong>Jam:</strong> <?php echo e($row['jam']); ?></p>
                <p><strong>Catatan:</strong> <?php echo e($row['catatan']); ?></p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
    $(document).ready(function () {
        $('#pelangganTable').DataTable({
            responsive: true,
            order: [[0, 'desc']]
        });
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
