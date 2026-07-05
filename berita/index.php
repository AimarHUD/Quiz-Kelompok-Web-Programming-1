<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';

requireLogin();

$search = trim($_GET['search'] ?? '');
$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 5;
$offset = ($page - 1) * $limit;

$where = [];
$params = [];

if ($search !== '') {
    $where[] = '(judul LIKE :search OR isi LIKE :search OR kategori LIKE :search)';
    $params['search'] = '%' . $search . '%';
}

$sql = 'SELECT * FROM berita';
if ($where) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
}
$sql .= ' ORDER BY tanggal DESC, id DESC LIMIT :limit OFFSET :offset';

$stmt = $pdo->prepare($sql);
foreach ($params as $key => $value) {
    $stmt->bindValue(':' . $key, $value);
}
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$beritaList = $stmt->fetchAll();

$countSql = 'SELECT COUNT(*) as total FROM berita';
if ($where) {
    $countSql .= ' WHERE ' . implode(' AND ', $where);
}
$countStmt = $pdo->prepare($countSql);
foreach ($params as $key => $value) {
    $countStmt->bindValue(':' . $key, $value);
}
$countStmt->execute();
$totalItems = (int)$countStmt->fetchColumn();
$totalPages = max(1, (int)ceil($totalItems / $limit));

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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Kelola Berita</h3>
                        <p class="text-muted mb-0">Kelola berita Anda dengan CRUD lengkap.</p>
                    </div>
                    <a href="tambah.php" class="btn btn-primary mt-3 mt-md-0"><i class="bi bi-plus-circle me-2"></i>Tambah Berita</a>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3" data-flash-message="<?php echo e($flash['message']); ?>">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>

                <form method="get" class="row g-2 mb-4">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" placeholder="Cari judul, isi, atau kategori..." value="<?php echo e($search); ?>">
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search me-2"></i>Search</button>
                        <a href="index.php" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="beritaTable" class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($beritaList): ?>
                                <?php foreach ($beritaList as $item): ?>
                                    <tr>
                                        <td><?php echo e($item['id']); ?></td>
                                        <td>
                                            <strong><?php echo e($item['judul']); ?></strong>
                                        </td>
                                        <td><?php echo e($item['kategori']); ?></td>
                                        <td><?php echo e($item['penulis']); ?></td>
                                        <td><?php echo e($item['tanggal']); ?></td>
                                        <td>
                                            <span class="badge <?php echo $item['status'] === 'publish' ? 'bg-success' : 'bg-secondary'; ?>">
                                                <?php echo e(ucfirst($item['status'])); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="detail.php?id=<?php echo e($item['id']); ?>" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                                <a href="edit.php?id=<?php echo e($item['id']); ?>" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                                <a href="hapus.php?id=<?php echo e($item['id']); ?>" class="btn btn-sm btn-outline-danger delete-berita"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="7" class="text-center text-muted py-4">Tidak ada data berita.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($totalPages > 1): ?>
                    <nav>
                        <ul class="pagination justify-content-end mt-3">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="index.php?search=<?php echo urlencode($search); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.jQuery && jQuery.fn.DataTable) {
            jQuery('#beritaTable').DataTable({
                paging: false,
                searching: false,
                info: false,
                order: [[4, 'desc']]
            });
        }

        document.querySelectorAll('.delete-berita').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('href');

                Swal.fire({
                    title: 'Hapus berita ini?',
                    text: 'Tindakan ini tidak dapat dibatalkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
