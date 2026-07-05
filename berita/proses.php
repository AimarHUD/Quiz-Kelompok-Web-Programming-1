HEAD
<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/berita/index.php');
}

$aksi = $_POST['aksi'] ?? '';
$judul = trim($_POST['judul'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$penulis = trim($_POST['penulis'] ?? '');
$tanggal = trim($_POST['tanggal'] ?? '');
$status = trim($_POST['status'] ?? 'draft');
$isi = trim($_POST['isi'] ?? '');

if ($judul === '' || $kategori === '' || $penulis === '' || $tanggal === '' || $isi === '') {
    setFlash('danger', 'Semua field wajib diisi.');
    redirect('/berita/index.php');
}

$slug = slugify($judul);
$gambarName = null;

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK && isImageFile($_FILES['gambar'])) {
    $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
    $gambarName = time() . '_' . uniqid() . '.' . $ext;
    $targetPath = __DIR__ . '/../assets/uploads/' . $gambarName;
    if (!is_dir(__DIR__ . '/../assets/uploads')) {
        mkdir(__DIR__ . '/../assets/uploads', 0777, true);
    }
    move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath);
}

if ($aksi === 'tambah') {
    $stmt = $pdo->prepare('INSERT INTO berita (judul, slug, isi, gambar, kategori, penulis, tanggal, status) VALUES (:judul, :slug, :isi, :gambar, :kategori, :penulis, :tanggal, :status)');
    $stmt->execute([
        'judul' => $judul,
        'slug' => $slug,
        'isi' => $isi,
        'gambar' => $gambarName,
        'kategori' => $kategori,
        'penulis' => $penulis,
        'tanggal' => $tanggal,
        'status' => $status,
    ]);
    setFlash('success', 'Berita berhasil ditambahkan.');
} elseif ($aksi === 'edit') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id > 0) {
        $currentStmt = $pdo->prepare('SELECT gambar FROM berita WHERE id = :id');
        $currentStmt->execute(['id' => $id]);
        $current = $currentStmt->fetch();

        if ($gambarName) {
            if ($current && $current['gambar'] && $current['gambar'] !== 'default.jpg') {
                $oldFile = __DIR__ . '/../assets/uploads/' . $current['gambar'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $stmt = $pdo->prepare('UPDATE berita SET judul = :judul, slug = :slug, isi = :isi, gambar = :gambar, kategori = :kategori, penulis = :penulis, tanggal = :tanggal, status = :status WHERE id = :id');
            $stmt->execute([
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $isi,
                'gambar' => $gambarName,
                'kategori' => $kategori,
                'penulis' => $penulis,
                'tanggal' => $tanggal,
                'status' => $status,
                'id' => $id,
            ]);
        } else {
            $stmt = $pdo->prepare('UPDATE berita SET judul = :judul, slug = :slug, isi = :isi, kategori = :kategori, penulis = :penulis, tanggal = :tanggal, status = :status WHERE id = :id');
            $stmt->execute([
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $isi,
                'kategori' => $kategori,
                'penulis' => $penulis,
                'tanggal' => $tanggal,
                'status' => $status,
                'id' => $id,
            ]);
        }
        setFlash('success', 'Berita berhasil diperbarui.');
    }
} else {
    setFlash('danger', 'Aksi tidak valid.');
}

redirect('/berita/index.php');

<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/berita/index.php');
}

$aksi = $_POST['aksi'] ?? '';
$judul = trim($_POST['judul'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$penulis = trim($_POST['penulis'] ?? '');
$tanggal = trim($_POST['tanggal'] ?? '');
$status = trim($_POST['status'] ?? 'draft');
$isi = trim($_POST['isi'] ?? '');

if ($judul === '' || $kategori === '' || $penulis === '' || $tanggal === '' || $isi === '') {
    setFlash('danger', 'Semua field wajib diisi.');
    redirect('/berita/index.php');
}

$slug = slugify($judul);
$gambarName = null;

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK && isImageFile($_FILES['gambar'])) {
    $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
    $gambarName = time() . '_' . uniqid() . '.' . $ext;
    $targetPath = __DIR__ . '/../assets/uploads/' . $gambarName;
    if (!is_dir(__DIR__ . '/../assets/uploads')) {
        mkdir(__DIR__ . '/../assets/uploads', 0777, true);
    }
    move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath);
}

if ($aksi === 'tambah') {
    $stmt = $pdo->prepare('INSERT INTO berita (judul, slug, isi, gambar, kategori, penulis, tanggal, status) VALUES (:judul, :slug, :isi, :gambar, :kategori, :penulis, :tanggal, :status)');
    $stmt->execute([
        'judul' => $judul,
        'slug' => $slug,
        'isi' => $isi,
        'gambar' => $gambarName,
        'kategori' => $kategori,
        'penulis' => $penulis,
        'tanggal' => $tanggal,
        'status' => $status,
    ]);
    setFlash('success', 'Berita berhasil ditambahkan.');
} elseif ($aksi === 'edit') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id > 0) {
        $currentStmt = $pdo->prepare('SELECT gambar FROM berita WHERE id = :id');
        $currentStmt->execute(['id' => $id]);
        $current = $currentStmt->fetch();

        if ($gambarName) {
            if ($current && $current['gambar'] && $current['gambar'] !== 'default.jpg') {
                $oldFile = __DIR__ . '/../assets/uploads/' . $current['gambar'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $stmt = $pdo->prepare('UPDATE berita SET judul = :judul, slug = :slug, isi = :isi, gambar = :gambar, kategori = :kategori, penulis = :penulis, tanggal = :tanggal, status = :status WHERE id = :id');
            $stmt->execute([
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $isi,
                'gambar' => $gambarName,
                'kategori' => $kategori,
                'penulis' => $penulis,
                'tanggal' => $tanggal,
                'status' => $status,
                'id' => $id,
            ]);
        } else {
            $stmt = $pdo->prepare('UPDATE berita SET judul = :judul, slug = :slug, isi = :isi, kategori = :kategori, penulis = :penulis, tanggal = :tanggal, status = :status WHERE id = :id');
            $stmt->execute([
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $isi,
                'kategori' => $kategori,
                'penulis' => $penulis,
                'tanggal' => $tanggal,
                'status' => $status,
                'id' => $id,
            ]);
        }
        setFlash('success', 'Berita berhasil diperbarui.');
    }
} else {
    setFlash('danger', 'Aksi tidak valid.');
}

redirect('/berita/index.php');
fe6f42847667cbb61a120e61aa3e7734c70c8aba
