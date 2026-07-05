<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    $stmt = $pdo->prepare('SELECT gambar FROM berita WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch();

    if ($item && $item['gambar'] && $item['gambar'] !== 'default.jpg') {
        $filePath = __DIR__ . '/../assets/uploads/' . $item['gambar'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    $deleteStmt = $pdo->prepare('DELETE FROM berita WHERE id = :id');
    $deleteStmt->execute(['id' => $id]);
    setFlash('success', 'Berita berhasil dihapus.');
}

redirect('/berita/index.php');
