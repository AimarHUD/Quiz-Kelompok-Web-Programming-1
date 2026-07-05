HEAD
<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/form/index.php');
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$no_hp = trim($_POST['no_hp'] ?? '');
$jenis_kendaraan = trim($_POST['jenis_kendaraan'] ?? '');
$nomor_polisi = trim($_POST['nomor_polisi'] ?? '');
$jenis_paket = trim($_POST['jenis_paket'] ?? '');
$tanggal = trim($_POST['tanggal'] ?? '');
$jam = trim($_POST['jam'] ?? '');
$catatan = trim($_POST['catatan'] ?? '');

if ($nama === '' || $email === '' || $no_hp === '' || $jenis_kendaraan === '' || $nomor_polisi === '' || $jenis_paket === '' || $tanggal === '' || $jam === '') {
    setFlash('danger', 'Semua field wajib diisi.');
    redirect('/form/index.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('danger', 'Format email tidak valid.');
    redirect('/form/index.php');
}

$stmt = $pdo->prepare('INSERT INTO pelanggan (nama, email, no_hp, jenis_kendaraan, nomor_polisi, jenis_paket, tanggal, jam, catatan) VALUES (:nama, :email, :no_hp, :jenis_kendaraan, :nomor_polisi, :jenis_paket, :tanggal, :jam, :catatan)');
$stmt->execute([
    'nama' => $nama,
    'email' => $email,
    'no_hp' => $no_hp,
    'jenis_kendaraan' => $jenis_kendaraan,
    'nomor_polisi' => $nomor_polisi,
    'jenis_paket' => $jenis_paket,
    'tanggal' => $tanggal,
    'jam' => $jam,
    'catatan' => $catatan,
]);

setFlash('success', 'Data pelanggan berhasil disimpan.');
redirect('/form/index.php');

<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('/form/index.php');
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$no_hp = trim($_POST['no_hp'] ?? '');
$jenis_kendaraan = trim($_POST['jenis_kendaraan'] ?? '');
$nomor_polisi = trim($_POST['nomor_polisi'] ?? '');
$jenis_paket = trim($_POST['jenis_paket'] ?? '');
$tanggal = trim($_POST['tanggal'] ?? '');
$jam = trim($_POST['jam'] ?? '');
$catatan = trim($_POST['catatan'] ?? '');

if ($nama === '' || $email === '' || $no_hp === '' || $jenis_kendaraan === '' || $nomor_polisi === '' || $jenis_paket === '' || $tanggal === '' || $jam === '') {
    setFlash('danger', 'Semua field wajib diisi.');
    redirect('/form/index.php');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('danger', 'Format email tidak valid.');
    redirect('/form/index.php');
}

$stmt = $pdo->prepare('INSERT INTO pelanggan (nama, email, no_hp, jenis_kendaraan, nomor_polisi, jenis_paket, tanggal, jam, catatan) VALUES (:nama, :email, :no_hp, :jenis_kendaraan, :nomor_polisi, :jenis_paket, :tanggal, :jam, :catatan)');
$stmt->execute([
    'nama' => $nama,
    'email' => $email,
    'no_hp' => $no_hp,
    'jenis_kendaraan' => $jenis_kendaraan,
    'nomor_polisi' => $nomor_polisi,
    'jenis_paket' => $jenis_paket,
    'tanggal' => $tanggal,
    'jam' => $jam,
    'catatan' => $catatan,
]);

setFlash('success', 'Data pelanggan berhasil disimpan.');
redirect('/form/index.php');
fe6f42847667cbb61a120e61aa3e7734c70c8aba
