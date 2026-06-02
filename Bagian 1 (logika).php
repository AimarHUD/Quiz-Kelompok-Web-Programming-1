<?php
$result = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $nim = trim($_POST['nim'] ?? '');
    $kehadiran = floatval($_POST['kehadiran'] ?? 0);
    $tugas = floatval($_POST['tugas'] ?? 0);
    $project_akhir = floatval($_POST['project_akhir'] ?? 0);

    // Validasi
    if (empty($nama)) $errors[] = "Nama wajib diisi.";
    if (empty($nim)) $errors[] = "NIM wajib diisi.";
    if ($kehadiran < 0 || $kehadiran > 100) $errors[] = "Nilai Kehadiran harus antara 0-100.";
    if ($tugas < 0 || $tugas > 100) $errors[] = "Nilai Tugas harus antara 0-100.";
    if ($project_akhir < 0 || $project_akhir > 100) $errors[] = "Nilai Project Akhir harus antara 0-100.";

    if (empty($errors)) {
        // Bobot Penilaian
        $nilai_akhir = ($kehadiran * 0.20) + ($tugas * 0.25) + ($project_akhir * 0.55);

        // Range Nilai
        if ($nilai_akhir >= 80) $huruf = 'A';
        elseif ($nilai_akhir >= 70) $huruf = 'B';
        elseif ($nilai_akhir >= 60) $huruf = 'C';
        elseif ($nilai_akhir >= 31) $huruf = 'D';
        else $huruf = 'F';

        $result = [
            'nama' => $nama,
            'nim' => $nim,
            'kehadiran' => $kehadiran,
            'tugas' => $tugas,
            'project_akhir' => $project_akhir,
            'nilai_akhir' => round($nilai_akhir, 2),
            'huruf' => $huruf,
        ];
    }
}
?>